@include('componentes.header')

        <h1>Login</h1>

        <form action="/login" method="POST">
            @csrf
            Usuario <input type="text" name="name"> <br>
            Password <input type="password" name="password"> <br>
           
            <input type="submit" value="Iniciar sesión"><br><br>
        </form>

        @if(session('error'))
            <p> {{ session("error") }}</p>
        @endif
        
@include('componentes.footer')
