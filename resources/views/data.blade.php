@extends('default')
@section('title')   
    Dashboard
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
    height: auto;
    width: 0.7rem;
}

.dropdown i {
    transform: scale(0.7)
}

.dropdownlist {
  max-height: 50px;
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

.utilbar button:hover {
    background-color: green;
    transform: scale(0.99);
}

.utilbar button img{
    height: 0.6rem;
    margin-right: 0.3rem;
}

.utilbar > p {
    font-size: 150%;
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
    min-width: 10vw;
    margin-right: 5px;
    margin-top: 1rem;
}

.onlineinfo{
    font-size: 10px;
    color: #1BE70A;
}

.time{
    font-size: 10px;
    margin-top: 1rem;
}

.roomname {
    font-size: 20px;
    font-weight: bold;
    margin-top: 0.5rem;
}

.datagrid{
    height: 100%;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr;
    grid-template-rows: 1fr;
    grid-column-gap: 0.7rem;
    margin-left: auto;
}

.datacard{
    background: #282828;
    border-radius: 0.5rem;
    padding: 0.5rem 0;
    text-align: center;
    width: 4rem; 
}

.datacard:hover {
    border: 0.1px solid green;
    transform: scale(1.02);
    z-index: 1;
}

.datacard *{
    margin: 0 auto;
}

.qualityscore {
    border: 2px solid rgb(var(--r), var(--g), var(--b));
    border-radius: 50%;
    height: 82%;
    width: 100%;
    margin-top: auto;
    margin-bottom: auto;
    display: flex;
    align-items: center;
    justify-content: center;
    --r: 255;
    --g: 255;
    --b: 255;
    box-shadow: 0rem 0rem 0.5rem rgba(var(--r), var(--g), var(--b), 0.5);
	animation: pulse 2s infinite;
}

@keyframes pulse {
	0% {
		box-shadow: 0 0 0 0.2rem rgba(var(--r), var(--g), var(--b), 0.4);
	}

	70% {
		box-shadow: 0 0 0 0.5rem rgba(var(--r), var(--g), var(--b), 0);
	}

	100% {
		box-shadow: 0 0 0 0.2rem rgba(var(--r), var(--g), var(--b), 0);
	}
}

.qualityscore__number {
    text-align: center;
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

.datalabel_licht {
    font-size: 9px;
    margin-top: 0.8rem;
}

.datacard .lichtimg{
    height: 1rem;
    width: auto;
}

.status_button {
    /* z-index: 2; */
    padding: 0.5rem;
    border: 1px solid #1BE70A;
}

</style>
<script>
    // dropdown
    function openDropdown() {
        let dropdownlist = document.getElementById("js--dropdownlist");

        if (dropdownlist.classList.contains("dropdownlistHide")) {
            dropdownlist.classList.remove("dropdownlistHide");
        } else {
            dropdownlist.classList.add("dropdownlistHide");
        }
    }

    function openForm() {
        let add_device_form = document.getElementById("add_device");

        add_device_form.style.display = ''
    }
</script>
<body>
    <div class="titlebar">
      <a href="/data">
        <h2>VisiRoom</h2>
      </a>
      <p>Dashboard</p>
      <button class="dropdown" onclick="openDropdown()">
        <p class="username">{{ Auth::user()->name }}</p>
        <img src="/img/Person-Icon.svg" alt="Person Icon" />
        <i class="gg-chevron-down"></i>
        <div id="js--dropdownlist" class="dropdownlist dropdownlistHide">
          <a href="/logout">Uitloggen</a>
        </div>
      </button>
    </div>
    <div class="utilbar">
      <p>Apparaten</p>
      <button onclick="openForm()">+ Apparaat Toevoegen</button>
    </div>
    <main>
        @foreach($data as $row)
        <button class="status_button" onclick="toggleStatus({{$row->id}})"><p class="onlineinfo">Online</p></button>
        <a href="/data/{{$row->naam}}">
            <article class="roomcard">
                <div class="roominfo">
                    <p class="roomname">{{ $row->naam }}</p>
                    <p class="time">{{ date('d-m-Y H:i', strtotime( $row->gemeten_op )) }}</p>
                </div>
                <div class="datagrid">
                    <article class="qualityscore">
                        <p class="qualityscore__number"> {{ $row->qualityscore }}</p>
                    </article>
                    <article class="datacard datacard_licht">
                        <img class="lichtimg" src="/img/Licht.svg" alt="Licht" />
                        <p class="datalabel datalabel_licht">Licht</p>
                        <p class="datavalue">{{ $row->ldr }}</p>
                    </article>
                    <article class="datacard datacard_temp">
                        <img src="/img/Temperatuur.svg" alt="Temperatuur" />
                        <p class="datalabel">Temperatuur</p>
                        <p class="datavalue">{{ $row->temperatuur }}??C</p>
                    </article>
                    <article class="datacard datacard_gas">
                        <img src="/img/Gas.svg" alt="Gas" />
                        <p class="datalabel">Gas</p>
                        <p class="datavalue" data-max="5000">{{ $row->gas }} PPM</p>
                    </article>
                    <article class="datacard datacard_luchtvocht">
                        <img src="/img/Luchtvocht.svg" alt="Luchtvocht" />
                        <p class="datalabel">Luchtvocht</p>
                        <p class="datavalue">{{ $row->luchtvochtigheid }}%</p>
                    </article>
                    <article class="datacard datacard_geluid">
                        <img src="/img/Geluid.svg" alt="Geluid" />
                        <p class="datalabel">Geluidsverlast</p>
                        <p class="datavalue">{{ $row->geluid }}</p>
                    </article>
                </div>
            </article>
        </a>
        @endforeach
        @foreach($ongemeten_locaties as $locatie)
            <button class="status_button" onclick="toggleStatus({{$locatie->id}})"><p class="onlineinfo">Online</p></button>
            <article class="roomcard">
                <div class="roominfo">
                    <p class="roomname">{{ $locatie->naam }}</p>
                    <p class="time">{{ date('d-m-Y H:i', strtotime( $locatie->aangemaakt_op )) }}</p>
                </div>
                <p class="no_data__text"> Er is nog geen data beschikbaar voor deze locatie... </p>
            </article>
        @endforeach
    </main>
    <section id="add_device" class="add_device-container" style="display: none">
        <h3 class="add_device__header"> Voeg Apparaat Toe </h3>
        <form id="add_device__form" class="add_device__form" action="{{ route('storedevice') }}" method="POST">
            @csrf
            <section class="add_device__inputrow">
                <label for="name"> Naam </label>
                <input class="add_device__input" name="name" id="name" type="text" />
            </section>

            <section class="add_device__inputrow">
                <label for="place"> Plaats </label>
                <input class="add_device__input" name="place" id="place" type="text" />
            </section>
            
            <section class="add_device__inputrow">
                <label for="address"> Adres </label>
                <input class="add_device__input" name="address" id="address" type="text" />
            </section>
            <section class="add_device__buttonrow">
                <button class="add_device__button" type="submit"> Voeg Toe </button>
            </section>
        </form>
    </section>
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