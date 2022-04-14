@extends('default')
@section('title')   
    {{$location->naam}}
@endsection('title')

@section('content')
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

.datainfo{
    padding: 0 5vw;
}

main{
    width: 90%;
    margin: 1rem auto;
    display: grid;
    grid-row-gap: 1rem;
}

.roomcard, .detailcard{
    background: #161616;
    height: fit-content;
    border-radius: 1rem;
    padding: 1rem;
}

.detailcard {
    margin-top: 1rem;
    position: relative;
}

.detailcard_title {
    text-align: center;
    font-size: 18px;
    margin-bottom: 1rem;
}

.detailcard_table {
    margin: 0 auto;
}

th {
    border-bottom: 2px solid #1BE70A !important;
    border: none;
    text-align: left;
    padding-right: 1rem;
    padding-bottom: 0.5rem;
}
td {
    border-bottom: 1px solid #1BE70A !important;
    border: none;
    padding: 0.5rem;
}

.roominfo{
    width: 5rem;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr 2fr 1fr;
    width: 100%;
}

.qualityscore {
    border: 2px solid rgb(var(--r), var(--g), var(--b));
    border-radius: 50%;
    width: 5vw;
    height: 5vw;
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
    position: relative;
}

.qualityscore_detail {
    position: absolute !important;
    top: 50%;
    transform: translateY(-50%);
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
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    margin: 0;
}

.onlineinfo{
    font-size: 10px;
    color: #1BE70A;
}

.roomname {
    font-size: 20px;
    width: 100%;
    text-align: center;
}

.time {
    font-size: 10px;
    text-align: right;
}

.datagrid{
    height: 100%;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr;
    grid-template-rows: 1fr;
    grid-column-gap: 0.5rem;
    margin: 0 auto;
    margin-top: 2rem;
    width: 60%;
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

.datalabel_licht {
    font-size: 9px;
    margin-top: 0.8rem;
}

.datavalue{
    font-size: 10px;
}

.datacard img{
    height: 1.8rem;
    width: auto;
}

.datacard .lichtimg{
    height: 1rem;
    width: auto;
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

    window.onload = () => {

        // data svg colors
        const valueElements = document.getElementsByClassName("datavalue");
        const datacards = document.getElementsByClassName("datacard");

        for(let i = 0; i < datacards.length; i++){
            let value = parseFloat(valueElements[i].textContent);

            if (value >= valueElements[i].dataset.max){
                valueElements[i].style.color = 'red'
                console.log(value + "is te hoog")
            } else if (valueElements[i].textContent == "ja"){
                valueElements[i].style.color = 'red'
                console.log("er is geluidsoverlast")
            } else if (value <= valueElements[i].dataset.min){
                valueElements[i].style.color = 'red'
                console.log(value + "is te laag")
            } else {
                valueElements[i].style.color = '#02A112'
            }
        }
    }
</script>
<body>
    <div class="titlebar">
      <a href="/data">
        <h2>VisiRoom</h2>
      </a>
      <p>{{$location->naam}}</p>
      <button class="dropdown" onclick="openDropdown()">
        <p class="username">{{ Auth::user()->name }}</p>
        <img src="/img/Person-Icon.svg" alt="Person Icon" />
        <i class="gg-chevron-down"></i>
        <div id="js--dropdownlist" class="dropdownlist dropdownlistHide">
          <a href="/logout">Uitloggen</a>
        </div>
      </button>
    </div>
    <p class="datainfo">[DATA INFORMATIE] (wat is te hoog, wat is te laag, wat kun je eraan doen) Lorem ipsum, dolor sit amet consectetur adipisicing elit. Incidunt nesciunt eius harum dignissimos, cum tempore commodi dicta magni alias at a reiciendis? Ipsa officia illum quis assumenda quidem id earum!</p>
    <!-- [GRAFIEKEN IPV ROOMCARDS] -->
    <main>
        <a href="/data/{{$location->naam}}">
            <article class="roomcard">
                <div class="roominfo">
                    <p class="onlineinfo">Online</p>
                    <p class="roomname">Samenvatting {{ $summary->naam }}</p>
                    <p class="time">Laatste meting: {{ date('d-m-Y H:i', strtotime( $summary->gemeten_op )) }}</p>
                </div>
                <div class="datagrid">
                    <article class="qualityscore">
                        <p class="qualityscore__number"> {{ $summary->qualityscore }}</p>
                    </article>
                    <article class="datacard datacard_licht">
                        <img class="lichtimg" src="/img/Licht.svg" alt="Licht" />
                        <p class="datalabel datalabel_licht">Licht</p>
                        <p class="datavalue">{{ $summary->ldr }}</p>
                    </article>
                    <article class="datacard datacard_temp">
                        <img src="/img/Temperatuur.svg" alt="Temperatuur" />
                        <p class="datalabel">Temperatuur</p>
                        <p class="datavalue">{{ $summary->temperatuur }}°C</p>
                    </article>
                    <article class="datacard datacard_gas">
                        <img src="/img/Gas.svg" alt="Gas" />
                        <p class="datalabel">Gas</p>
                        <p class="datavalue" data-max="5000">{{ $summary->gas }} PPM</p>
                    </article>
                    <article class="datacard datacard_luchtvocht">
                        <img src="/img/Luchtvocht.svg" alt="Luchtvocht" />
                        <p class="datalabel">Luchtvocht</p>
                        <p class="datavalue">{{ $summary->luchtvochtigheid }}</p>
                    </article>
                    <article class="datacard datacard_geluid">
                        <img src="/img/Geluid.svg" alt="Geluid" />
                        <p class="datalabel">Geluid overlast</p>
                        <p class="datavalue">{{ $summary->geluid }}</p>
                    </article>
                </div>
            </article>
        </a>
        <article class="detailcard">
            <h3 class="detailcard_title">Licht</h3>
            <table class="detailcard_table">
                <tr>
                    <th>Helderheid (lux)</th>
                    <th>gemeten op</th>
                </tr>
                @foreach($data->slice(0, 10) as $row)
                <tr>
                    <td>{{ $row->ldr }}</td>
                    <td>{{ date('d-m-Y H:i', strtotime( $row->gemeten_op )) }}</td>
                </tr>
                @endforeach
            </table>
            <div class="qualityscore qualityscore_detail">
                <p class="lichtscore qualityscore__number"></p>
            </div>
        </article>
        <article class="detailcard">
            <h3 class="detailcard_title">Temperatuur</h3>
            <table class="detailcard_table">
                <tr>
                    <th>Temperatuur (°C)</th>
                    <th>gemeten op</th>
                </tr>
                @foreach($data->slice(0, 10) as $row)
                <tr>
                    <td>{{ $row->temperatuur }}</td>
                    <td>{{ date('d-m-Y H:i', strtotime( $row->gemeten_op )) }}</td>
                </tr>
                @endforeach
            </table>
            <div class="qualityscore qualityscore_detail">
                <p class="temperatuurscore qualityscore__number"></p>
            </div>
        </article>
        <article class="detailcard">
            <h3 class="detailcard_title">Gas</h3>
            <table class="detailcard_table">
                <tr>
                    <th>CO2 concentratie (ppm)</th>
                    <th>gemeten op</th>
                </tr>
                @foreach($data->slice(0, 10) as $row)
                <tr>
                    <td>{{ $row->gas }}</td>
                    <td>{{ date('d-m-Y H:i', strtotime( $row->gemeten_op )) }}</td>
                </tr>
                @endforeach
            </table>
            <div class="qualityscore qualityscore_detail">
                <p class="gasscore qualityscore__number"></p>
            </div>
        </article>
        <article class="detailcard">
            <h3 class="detailcard_title">Luchtvochtigheid</h3>
            <table class="detailcard_table">
                <tr>
                    <th>Luchtvochtigheid (%)</th>
                    <th>gemeten op</th>
                </tr>
                @foreach($data->slice(0, 10) as $row)
                <tr>
                    <td>{{ $row->luchtvochtigheid }}</td>
                    <td>{{ date('d-m-Y H:i', strtotime( $row->gemeten_op )) }}</td>
                </tr>
                @endforeach
            </table>
            <div class="qualityscore qualityscore_detail">
                <p class="luchtvochtscore qualityscore__number"></p>
            </div>
        </article>
        
    </main>
</body>
@endsection('content')