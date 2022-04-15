<template>
  <body>
    <div class="titlebar">
      <h2>IPMEDT5</h2>
      <p>Dashboard</p>
      <img src="/img/Person-Icon.svg" alt="Person Icon" />
    </div>
    <div class="utilbar">
      <p>Apparaten</p>
      <button><img src="/img/Plus.svg" alt="Plus" />Apparaat Toevoegen</button>
    </div>
    <main>
      <article class="roomcard">
        <div class="roominfo">
          <p class="onlineinfo">Online</p>
          <p class="roomname">Room-name</p>
        </div>
        <div class="datagrid">
          <article class="datacard">
            <img src="/img/Zuurstof.svg" alt="Zuurstof" />
            <p class="datalabel">Licht</p>
            <p class="datavalue">420</p>
          </article>
          <article class="datacard">
            <img src="/img/Temperatuur.svg" alt="Temperatuur" />
            <p class="datalabel">Temperatuur</p>
            <p class="datavalue">12°C</p>
          </article>
          <article class="datacard">
            <img src="/img/Gas.svg" alt="Gas" />
            <p class="datalabel">Gas</p>
            <p class="datavalue">312 PPM</p>
          </article>
          <article class="datacard">
            <img src="/img/Luchtvocht.svg" alt="Luchtvocht" />
            <p class="datalabel">Luchtvocht</p>
            <p class="datavalue">121</p>
          </article>
          <article class="datacard">
            <img src="/img/Geluid.svg" alt="Geluid" />
            <p class="datalabel">Geluid overlast</p>
            <p class="datavalue">23dB</p>
          </article>
        </div>
      </article>
      <article class="roomcard">
        <div class="roominfo">
          <p class="onlineinfo">Online</p>
          <p class="roomname">Room-name</p>
        </div>
        <div class="datagrid">
          <article class="datacard">
            <img src="/img/Zuurstof.svg" alt="Zuurstof" />
            <p class="datalabel">Zuurstof</p>
            <p class="datavalue">100%</p>
          </article>
          <article class="datacard">
            <img src="/img/Luchtvocht.svg" alt="Luchtvocht" />
            <p class="datalabel">Luchtvocht</p>
            <p class="datavalue">75%</p>
          </article>
          <article class="datacard">
            <img src="/img/Koolstofmonoxide.svg" alt="Koolstofmonoxide" />
            <p class="datalabel">Koolstof- monoxide</p>
            <p class="datavalue">741</p>
          </article>
          <article class="datacard">
            <img src="/img/Temperatuur.svg" alt="Temperatuur" />
            <p class="datalabel">Temperatuur</p>
            <p class="datavalue">16°C</p>
          </article>
          <article class="datacard">
            <img src="/img/Gas.svg" alt="Gas" />
            <p class="datalabel">Gas</p>
            <p class="datavalue">4PPM</p>
          </article>
          <article class="datacard">
            <img src="/img/Geluid.svg" alt="Geluid" />
            <p class="datalabel">Geluid</p>
            <p class="datavalue">23dB</p>
          </article>
        </div>
      </article>
      <article class="roomcard">
        <div class="roominfo">
          <p class="onlineinfo">Online</p>
          <p class="roomname">Room-name</p>
        </div>
        <div class="datagrid">
          <article class="datacard">
            <img src="/img/Zuurstof.svg" alt="Zuurstof" />
            <p class="datalabel">Zuurstof</p>
            <p class="datavalue">100%</p>
          </article>
          <article class="datacard">
            <img src="/img/Luchtvocht.svg" alt="Luchtvocht" />
            <p class="datalabel">Luchtvocht</p>
            <p class="datavalue">75%</p>
          </article>
          <article class="datacard">
            <img src="/img/Koolstofmonoxide.svg" alt="Koolstofmonoxide" />
            <p class="datalabel">Koolstof- monoxide</p>
            <p class="datavalue">741</p>
          </article>
          <article class="datacard">
            <img src="/img/Temperatuur.svg" alt="Temperatuur" />
            <p class="datalabel">Temperatuur</p>
            <p class="datavalue">16°C</p>
          </article>
          <article class="datacard">
            <img src="/img/Gas.svg" alt="Gas" />
            <p class="datalabel">Gas</p>
            <p class="datavalue">4PPM</p>
          </article>
          <article class="datacard">
            <img src="/img/Geluid.svg" alt="Geluid" />
            <p class="datalabel">Geluid</p>
            <p class="datavalue">23dB</p>
          </article>
        </div>
      </article>
    </main>
  </body>
</template>

<script>
export default {
  data() {
      return {
      }
    },

    methods: {
    },
}
</script>

<style scoped>
*{
    margin: 0;
    padding: 0;
    font-family: 'Open Sans', sans-serif;
    color: #ffffff;
}

body{
    background: #000000;
}

.titlebar{
    padding: 2rem 5%;
    display: flex;
    width: 90%;
    position: sticky;
    position: -webkit-sticky;
    top: 0;
}

.titlebar *{
    margin-bottom: 0;
    margin-top: auto;
}

.titlebar h2{
    background: linear-gradient(90deg, #099F2A, #2EF242);
    color: transparent;
    -webkit-background-clip: text;
    background-clip: text;
}

.titlebar p{
    margin-left: 1rem;
}

.titlebar img{
    margin-left: auto;
    height: 1.5rem;
}

.utilbar{
    padding: 0 5%;
    display: flex;
    width: 90%;
    position: sticky;
    position: -webkit-sticky;
    top: 0;
}

.utilbar *{
    margin: auto 0;
}

.utilbar button{
    background: #02A112;
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    margin-left: auto;
}

.utilbar button img{
    height: 0.6rem;
    margin-right: 0.3rem;
}

main{
    width: 90%;
    margin: 1rem auto;
    display: grid;
    grid-row-gap: 1rem;
}

.roomcard{
    background: #161616;
    height: fit-content;
    display: flex;
    border-radius: 1rem;
    padding: 1rem;
}

.roominfo{
    width: 5rem;
}

.onlineinfo{
    font-size: 8px;
    color: #1BE70A;
}

.roomname{
    font-size: 10px;
    margin-top: 1rem;
}

.datagrid{
    height: 100%;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr;
    grid-template-rows: 1fr;
    grid-column-gap: 0.5rem;
}

.datacard{
    background: #282828;
    border-radius: 0.5rem;
    padding: 0.5rem 0;
    text-align: center;
}

.datacard *{
    margin: 0 auto;
}

.datalabel{
    font-size: 7px;
}

.datavalue{
    font-size: 10px;
}

.datacard img{
    height: 2rem;
}
</style>