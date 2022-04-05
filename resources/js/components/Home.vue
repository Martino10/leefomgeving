<template>
  <div class="container">
        <div class="title">
            <h1>IPMEDT5</h1>
            <h2>Quality of tomorrow</h2>
        </div>
        <img src="/img/background1.svg" alt="Background vector"/>
        <div class="login">
            <router-link to="/login">
            <button class="loginBtn">Inloggen</button>
            </router-link>
            <p>Nog geen account? <a href="/Login.html">Maak een account aan</a></p>
        </div>
    </div>
</template>

<script>

export default {
  mounted() {
        console.log('Component mounted.')
    }
}
</script>

<style scoped>
.container {
    position: fixed;
    display: flex;
    flex-direction: column;
    padding-top: 3vh;
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
</style>