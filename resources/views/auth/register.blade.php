@extends('welcome')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-top:15%;margin-left: 3%">
        <div class="col-md-8">
            <div class="card" style="margin-top: 20px">
                <div class="card-header text-center fs-4">{{ __('เพิ่มผู้ใช้งาน') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อผู้ใช้งาน') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-3 form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('ที่อยู่อีเมล') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('รหัสผ่าน') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-3 form-group row">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('ยืนยันรหัสผ่าน') }}</label>

                            <div class="col-md-6">
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="mb-3 form-group row">
                            {{--  Dropdown later  --}}
                            <label class="col-md-4 col-form-label text-md-right" >{{ __('ประเภท') }}</label>
                            <div class="col-md-6">

                                <select class="text-center bg rounded-1 form-select w-100 h-100"
                                        name="type" id="type" required focus>
                                    <option value="Admin">แอดมิน</option>
                                    <option value="FrontWorker">พนักงานหน้าร้าน</option>
                                    <option value="BackWorker">พนักงานหลังร้าน</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 form-group row">
                            <label class="col-md-4 col-form-label text-md-right">รูปภาพ</label>

                            <div class="col-md-6">
                                <input name="path" type="file" class="form-control" >
                            </div>
                        </div>

                        <div  class="text-center">
                            <button type="submit" class="btn btn-primary" style="width: 200px;">
                                {{ __('เพิ่ม') }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

