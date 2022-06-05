@extends('default')
@section('title')   
    Dashboard
@endsection('title')

@section('content')
<style>
*, *::before, *::after {
padding: 0;
margin: 0; 
box-sizing: border-box;
}

html {
    font-size: 62.5%;
}

body {
    font-family: 'SF Pro Display', sans-serif;
    background-color: black;
}

.container {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    justify-content: center;
    margin: auto;
    height: 100vh;
    width: 100vw;
}

.title h1 {
    font-size: 5.4rem;
    font-weight: 500;

    background-color: white;
    background-image: linear-gradient(90deg, #099F2A 0%, #2EF242 100%);
    background-clip: text;
    background-size: 100%;
    background-repeat: repeat;

    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent; 
    -moz-background-clip: text;
    -moz-text-fill-color: transparent;
}

.title h2 {
    font-size: 2.5rem;
    font-weight: 400;
    color: white;
}

.container img {
    padding-top: 2rem;
}

.loginBtn {
    margin-top: 3rem;
    width: 32rem;
    height: 3.1rem;
    border-radius: 5px;
    border: none;
    color: black;
    background-color: white;
    font-size: 1.8rem;
    font-weight: 500;
}

.loginBtn:hover {
    cursor: pointer;
}

.login p {
    color: white;
    font-size: 1.5rem;
    font-weight: 200;
    padding: 2rem;
}

.login a {
    font-weight: bold;
    color: #0C9600;
    text-decoration: none;
}


.loginForm {
    display: flex;
    flex-wrap: wrap;
    flex-direction: column;
    align-items: center;
    margin-top: 9vh;
    color: white;
}

.email h1, .password h1 {
    font-weight: 500;
    font-size: 1.7rem;
    padding: 1.5rem 0 1rem 0;
    text-align: left;
}


.rememberForget {
   display: flex;
   width: 100%;
   align-items: center;
   margin-top: 1rem;
   font-size: 1.2rem;   
}

.rememberForget input {
    height: 2rem;
    width: 2rem;
}

.rememberForget label {
    margin-left: 0.5rem;
}

.rememberForget a {
    margin-left: auto;
    text-decoration: none;
    color: white;
}


.resetPswd {
    width: 32rem;
    text-align: right;
    color: white;
    text-decoration: none;
    font-size: 1.2rem;
    font-weight: 400;
}

form input {
    background-color: #121212;
    border: 1px solid #3E3E3E;
    box-sizing: border-box;
    border-radius: 5px;
    width: 32rem;
    height: 3.5rem;
}

input[type=password],input[type=email] {
    font-size: 1.3rem;
    color: white;
    padding-left: 1rem;
    background-color: #121212;
}

form input::placeholder {
    padding-left: 1rem;   
}

.rememberForgot {
    width: 100%;
    display: inline-block;
}

.registerBtn {
    margin-top: 1.2rem;
    width: 32rem;
    height: 3.1rem;
    border-radius: 5px;
    border: 1px solid white;
    color: white;
    background-color: transparent;
    font-size: 1.4rem;
    font-weight: 200;
}

</style>

<div class="container">
    <div class="title">
        <h1>VisiRoom</h1>
        <h2>Quality of tomorrow</h2>
    </div>
    <form class="loginForm" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="email">
            <h1>E-Mail</h1>
            <input type="email" name="email" id="email" placeholder="Vul hier je e-mail in">
        </div>
        <div class="password">
            <h1>Wachtwoord</h1>
            <input type="password" name="password" id="password" placeholder="Vul hier je wachtwoord in">
        </div>
        <div class="rememberForget">
            <input type="checkbox" name="Remember me" id="remember">
            <label>Onthoud mij</label>
            <a href="{{ route('password.request') }}">Wachtwoord vergeten?</a>
        </div>
        <button class="loginBtn">Inloggen</button>
        <a class="registerBtn" href="/register">Maak een account aan</button>
    </form>
</div>
@endsection('content')