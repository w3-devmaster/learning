<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('index') }}">หน้าแรก</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('account.index') }}">ข้อมูลส่วนตัว</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('feature') }}">ฟีเจอร์</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('product.index') }}">สินค้า</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('post.index') }}">โพสต์ทั้งหมด</a>
                </li>
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li> --}}
            </ul>
            <ul class="navbar-nav ms-auto" >
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)" onclick="document.getElementById('form-logout').submit()">ออกจากระบบ</a>
                </li>
                <form id="form-logout" action="{{ route('logout') }}" method="post" >
                    @csrf
                    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                </form>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">เข้าสู่ระบบ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">ลงทะเบียน</a>
                </li>
                @endauth
            </ul>

        </div>
    </div>
</nav>
