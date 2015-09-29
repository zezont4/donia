<?php namespace App\Http\Controllers;

use App\Exceptions\ZezoException;
use App\Http\Requests;
use App\Http\Requests\PermissionRequest;
use App\Permission;
use Illuminate\Support\Facades\Route;
use League\Flysystem\Exception;

class PermissionController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
//        $this->middleware('acl');
    }

    public function index(Permission $permission)
    {

        $this->autoAddPermissionsFromRoutsFile();
        $permissionArray = $this->getPermissionsArray();
        $permissions = $permission->orderBy('permission_slug')->paginate(50);

        return view('permission.index', compact('permissions','permissionArray'));
    }

//    public function create(Permission $permission)
//    {
//
//
//        $permissions = $permission->orderBy('permission_slug')->paginate(50);
//
//        return view('permission.create', compact('permissions'));
//    }


//    public function store(PermissionRequest $request)
//    {
//        Permission::create($request->all());
//
//        return redirect()->back();
//    }

    public function edit(Permission $permission)
    {
        return view('permission.edit', compact('permission'));

    }

    public function update(Permission $permission, PermissionRequest $request)
    {
        $permission->update($request->all());

        return redirect()->route('permission.index');
    }

    public function autoAddPermissionsFromRoutsFile()
    {
        $permissionArray = $this->getPermissionsArray();
        foreach ($permissionArray as  $value) {
            $matches = null;
            $matchSlug = preg_match('/^[a-z0-9]+(?:-[a-z0-9]+)*$/', $value, $matches);
            if (!$matchSlug) {
                $permission_sake_cased = preg_replace('/[\._ ]/', '-', snake_case($value));
//                echo = "<div class='alert alert-danger'>zezo msg : Change ({$value}) to  ({$permission_sake_cased}) in permission name inside the Routs file</div>";
                $msg = "zezo msg : Change ({$value}) to  ({$permission_sake_cased}) in permission name inside the Routs file\n\r.";
                $msg = $msg . "يوجد خطأ في كتابة اسم الصلاحية التالية ({$value}) لذا ، يجب تغيير الإسم إلى  ({$permission_sake_cased}) وذلك داخل ملف الراوت \n";
//                echo $msg;
                throw new ZezoException($msg);
            } else {
                $permission_slug = $value;
                Permission::firstOrCreate(['permission_slug' => $permission_slug]);
            }
        }
    }

    public function getPermissionsArray()
    {
        $routeCollection = Route::getRoutes()->getRoutes();
        $permissionArray = [];
        foreach ($routeCollection as $key => $value) {
            $action = $value->getAction();
            if (isset($action['permission'])) {
                $permissionArray[$key] = $action['permission'];
            }
        }

        return $permissionArray;
    }

}
