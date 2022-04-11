@extends('default')
@section('title')   
    Data
@endsection('title')

@section('content')
<!-- Dashboard design met test data -->
<style>
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
    padding: 1.5rem 5%;
    display: flex;
    width: 100%;
    position: sticky;
    position: -webkit-sticky;
    top: 0;
    background-color: black;
    z-index: 1;
    border-bottom: 1px solid #1BE70A;
    margin-bottom: 1rem;
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

.titlebar > .dropdown {
    margin-left: auto;
    display: grid;
    grid-template-columns: 2fr 1fr 1fr;
    column-gap: 0.3rem;
    border: 1px solid #1BE70A;
    border-radius: 2px;
    min-width: 7vw;
    box-shadow: 0rem 0rem 0.5rem #1BE70A;
    position: relative;
}

.dropdown > .username {
    margin-left: 0.5rem;
}

.dropdown img {
    margin-top: auto;
    margin-bottom: auto;
}

.dropdown i {
    transform: scale(0.7)
}

.dropdownlist {
  max-height: 300px;
  position: absolute;
  top: 150%;
  background-color: #1BE70A;
  min-width: 100%;
  overflow: hidden;
  transition: 0.5s;
  border-radius: 10px;
}

.dropdownlist a{
  display: block;
  text-align: left;
  padding: 5px;
  text-decoration: none;
  border: 1px solid #1f861f;
  border-radius: 2px;
}

.dropdownlist a:hover {
    background-color: #1f861f;
}

.dropdownlistHide{
    max-height: 0px;
}

.utilbar{
    padding: 0 5%;
    display: flex;
    width: 100%;
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
    display: flex;
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
    margin-right: 5px;
}

.onlineinfo{
    font-size: 10px;
    color: #1BE70A;
}

.roomname, .time{
    font-size: 10px;
    margin-top: 1rem;
}

.datagrid{
    height: 100%;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
    grid-template-rows: 1fr;
    grid-column-gap: 0.5rem;
    margin-left: auto;
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
    font-size: 9px;
}

.datavalue{
    font-size: 10px;
}

.datacard img{
    height: 1.8rem;
    width: auto;
}
</style>
<script>
    function openDropdown() {
        let dropdownlist = document.getElementById("js--dropdownlist");

        if (dropdownlist.classList.contains("dropdownlistHide")) {
            dropdownlist.classList.remove("dropdownlistHide");
        } else {
            dropdownlist.classList.add("dropdownlistHide");
        }
    }
</script>
<body>
    <div class="titlebar">
      <h2>VisiRoom</h2>
      <p>Dashboard</p>
      <button class="dropdown" onclick="openDropdown()">
        <p class="username">{{ Auth::user()->name }}</p>
        <img src="/img/Person-Icon.svg" alt="Person Icon" />
        <i class="gg-chevron-down"></i>
        <div id="js--dropdownlist" class="dropdownlist dropdownlistHide">
          <a href="/logout">Uitloggen</a>
          <a href="">nogiets</a>
          <a href="">nogiets</a>
        </div>
      </button>
    </div>
    <div class="utilbar">
      <p>Apparaten</p>
      <button><img src="/img/Plus.svg" alt="Plus" />Apparaat Toevoegen</button>
    </div>
    <main>
        @foreach($data as $row)
        <article class="roomcard">
            <div class="roominfo">
                <p class="onlineinfo">Online</p>
                <p class="roomname">{{ $row->naam }}</p>
                <p class="time">{{ date('d-m-Y H:i', strtotime( $row->gemeten_op )) }}</p>
            </div>
            <div class="datagrid">
                <article class="datacard">
                    <img src="/img/Licht.svg" alt="Licht" />
                    <p class="datalabel">Licht</p>
                    <p class="datavalue">{{ $row->ldr }}</p>
                </article>
                <article class="datacard">
                    <img src="/img/Temperatuur.svg" alt="Temperatuur" />
                    <p class="datalabel">Temperatuur</p>
                    <p class="datavalue">{{ $row->temperatuur }}°C</p>
                </article>
                <article class="datacard">
                    <img src="/img/Gas.svg" alt="Gas" />
                    <p class="datalabel">Gas</p>
                    <p class="datavalue">{{ $row->gas }} PPM</p>
                </article>
                <article class="datacard">
                    <img src="/img/Luchtvocht.svg" alt="Luchtvocht" />
                    <p class="datalabel">Luchtvocht</p>
                    <p class="datavalue">{{ $row->luchtvochtigheid }}</p>
                </article>
                <article class="datacard">
                    <img src="/img/Geluid.svg" alt="Geluid" />
                    <p class="datalabel">Geluid overlast</p>
                    <p class="datavalue">{{ $row->geluid }}</p>
                </article>
            </div>
        </article>
        @endforeach
    </main>
</body>
<!-- Tabel om data te testen -->
<!-- <table class="data_table">
    <tr>
        <th>locatie_id</th>
        <th>naam</th>
        <th>plaats</th>
        <th>adres</th>
        <th>ldr</th>
        <th>temperatuur</th>
        <th>gas</th>
        <th>luchtvochtigheid</th>
        <th>geluidsoverlast</th>
        <th>gemeten op</th>
    </tr>
    @foreach($data as $row)
    <tr>
        <td>{{ $row->id }}</td>
        <td>{{ $row->naam }}</td>
        <td>{{ $row->plaats }}</td>
        <td>{{ $row->adres }}</td>
        <td>{{ $row->ldr }}</td>
        <td>{{ $row->temperatuur }}</td>
        <td>{{ $row->gas }}</td>
        <td>{{ $row->luchtvochtigheid }}</td>
        <td>{{ $row->geluid }}</td>
        <td>{{ $row->gemeten_op }}</td>
    </tr>
    @endforeach

</table> -->
@endsection('content')