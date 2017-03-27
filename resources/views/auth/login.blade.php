@extends('layouts.app')

@section('content')
<div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6" style="justify-content: ">
                <h2 class="font-bold">PT. Gutner Indonesia</h2>

                <p>
                    Merupakan salah satu perusahaan mutinasional terkemuka di Indonesia dan menjadi bagian dari Guntner - Group.
                </p>

                <p>
                    Sebagai salah satu perusahaan terkemuka di seluruh dunia di sektor teknologi perpindahan pana. 
                </p>

                <p>
                    Guntner Group hadir di semua benua dengan lokasi produksi serta Guntner aliliasi dan non - afiliasi penjualan dan perusahaan jasa.
                </p>

                <p>
                    <small>Dengan terus menerus berjuan untuk perbaikan dan kemajuan, Guntner - Group mampu menjamin pelanggan dan keberhasilan mitra bisnis yang berkelanjutan abadi.</small>
                </p>

            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    <form class="m-t" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input id="email" type="email" placeholder="Username" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary block full-width m-b"> Login </button>
                        
                        <div class="checkbox">
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                <small>Forgot Your Password?</small>
                            </a>

                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
                        </div>

                    </form>
                    <p class="m-t">
                        <small>Institut Bisnis Dan Informatika Stikom Surabaya &copy; 2017</small>
                    </p>
                    
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Copyright Developer Junior
            </div>
            <div class="col-md-6 text-right">
               <small>© 2014-2015</small>
            </div>
        </div>
    </div>
@endsection
