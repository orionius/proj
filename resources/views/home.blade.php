

@include('layouts.header')
@include('layouts.app')
@include('layouts.styles')

<body>
    


                @if (Auth::check())

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">



                <div class="card-header">Панель</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Вы зашли как зарегерсрированный пользователь ! Выполните дальнейшие действия</p>

                    <div class="container">
                        <div class="row">
                          <div class="col-sm">
                            <a href="{{ url('/confer_list') }}" class="btn btn-dark">Список</a></div>
                          <div class="col-sm">
                            <a href="{{ url('/add') }}" class="btn btn-dark">Создать</a></div>
                          <div class="col-sm">
                            <a href="{{ url('/admin') }}" class="btn btn-dark">Админка</a>
                          </div>
                        </div>
                      </div>



                </div>
            </div>
        </div>
    </div>
</div>

@endif

@include('layouts.footer')
@include('layouts.scripts')

</body>