@extends('layouts.master',['pageTitle' => 'تسجيل الدخول'])
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">بيانات الدخول</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{route('auth.login')}}">

                        {!! csrf_field() !!}

                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label class="col-md-4 control-label">اسم المستخدم</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                            </div>
                            {{--{!! $errors->first('email', '<span class="help-block">:message</span>') !!}--}}
                        </div>

                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label class="col-md-4 control-label">كلمة المرور</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">
                            </div>
                            {{--{!! $errors->first('password', '<span class="help-block">:message</span>') !!}--}}
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> تذكرني
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                                    دخول
                                </button>

                                <a href="/password/email">هل نسيت كلمة المرور</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
