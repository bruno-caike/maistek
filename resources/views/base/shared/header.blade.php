<div class="c-wrapper">
    <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
        <button class="c-header-toggler c-class-toggler d-lg-none mr-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show"><span class="c-header-toggler-icon"></span></button><a class="c-header-brand d-sm-none" href="#"><img class="c-header-brand" src="{{ asset('img/logo.png') }}" width="97" height="46" alt=""></a>
        <button class="c-header-toggler c-class-toggler ml-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true"><span class="c-header-toggler-icon"></span></button>
        <div class="c-header-nav mr-4">
            <ol class="breadcrumb border-0 m-0">
                <li class="breadcrumb-item"><a href="/dashboard"><i class="c-icon fas fa-home text-dark"></i></a></li>
                <?php $segments = ''; ?>
                @for($i = 1; $i <= count(Request::segments()); $i++)
                    <?php $segments .= '/'. Request::segment($i); ?>
                    @if($i < count(Request::segments()))
                        <li class="breadcrumb-item">{{ strtoupper(Request::segment($i)) }}</li>
                    @else
                        <li class="breadcrumb-item active">{{ strtoupper(Request::segment($i)) }}</li>
                    @endif
                @endfor
            </ol>
        </div>
        <ul class="c-header-nav ml-auto mr-4">
            <li class="c-header-nav-item d-md-down-none mx-2">
                Olá, {{ Auth::user()->name }}!
            </li>
            <li class="c-header-nav-item dropdown">
                <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <div class="c-avatar">
                        <i class="c-icon c-icon-2xl far fa-user-circle"></i>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right pt-0">
                    <div class="dropdown-header bg-light py-2"><strong>Configurações</strong></div>
                    <a class="dropdown-item" href="{{ route('profile.showProfile') }}">
                        <i class="far fa-address-card mr-2"></i> <span>Perfil</span>
                    </a>
                    <a class="dropdown-item" href="{{ route('users.indexChangePassword') }}">
                        <i class="fas fa-pen mr-2"></i> <span>Alterar senha</span>
                    </a>
                    <form action="{{ url('/logout') }}" class="" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item btn"><i class="fas fa-sign-out-alt mr-2"></i> <span>Sair</span></button>
                    </form>
                </div>
            </li>
        </ul>
    </header>
