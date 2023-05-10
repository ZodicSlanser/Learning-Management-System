<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<!--


-->
  <div class="container">
    @yield('content')
</div>

<style>
  *{
margin: 0;
padding: 0;
font-family: "Open Sans",sans-serif;
box-sizing: border-box;
text-decoration: none;
}
body {
background-color: #e3e3e3;
display: flex;
align-items: center;
justify-content: center;
flex-direction: column;
min-height: 100vh;
margin: 0;

}



.card_box span {
position: absolute;
overflow: hidden;
width: 150px;
height: 150px;
top: -10px;
left: -10px;
display: flex;
align-items: center;
justify-content: center;
}

.card_box span {
content: '';
position: absolute;
width: 150%;
height: 40px;
background-image: linear-gradient(45deg, #ff6547 0%, #ffb144  51%, #ff7053  100%);
transform: rotate(-45deg) translateY(-20px);
top: 52px;
margin-left: -58px;
display: flex;
align-items: right;
justify-content: center;
color: #fff;
font-weight: 600;
letter-spacing: 0.1em;
text-transform: uppercase;
box-shadow: 0 5px 10px rgba(0,0,0,0.23);
}

.card_box span::after {
content: '';
position: absolute;
width: 10px;
bottom: 0;
left: 0;
height: 10px;
z-index: -1;
box-shadow: 140px -140px #cc3f47;
background-image: linear-gradient(45deg, #FF512F 0%, #F09819  51%, #FF512F  100%);
}





/**************************************************************************************************/



.card {
display: flex;

position: relative;
overflow: visible;
width: 190px;
height: 254px;
background-color: #151515;

}

.content {
width: 100%;
height: 100%;
transform-style: preserve-3d;
transition: transform 300ms;
box-shadow: 0px 0px 10px 1px #000000ee;
border-radius: 5px;
background-color: #151515;

}

.front, .back {
background-color: #151515;
position: absolute;
width: 100%;
height: 100%;
backface-visibility: hidden;
-webkit-backface-visibility: hidden;
border-radius: 5px;
overflow: hidden;
background-color: #151515;

}

.back {
width: 100%;
height: 100%;
justify-content: center;
display: flex;
align-items: center;
overflow: hidden;
background-color: #151515;

}

.back::before {
position: absolute;
content: ' ';
display: block;
width: 160px;
height: 160%;
background: linear-gradient(90deg, transparent, #ff9966, #ff9966, #ff9966, #ff9966, transparent);
animation: rotation_481 5000ms infinite linear;

}

.back-content {

position: absolute;
width: 99%;
height: 99%;
background-color: #151515;
border-radius: 5px;
color: white;
display: flex;
flex-direction: column;
justify-content: center;
align-items: center;
gap: 30px;
}

.card:hover .content {
transform: rotateY(180deg);

}

@keyframes rotation_481 {
0% {
  transform: rotateZ(0deg);
}

0% {
  transform: rotateZ(360deg);
}
}

.front {
transform: rotateY(180deg);
color: white;
}

.front .front-content {
position: absolute;
width: 100%;
height: 100%;
padding: 10px;
display: flex;
flex-direction: column;
justify-content: space-between;
}

.front-content .badge {
background-color: #00000055;
padding: 2px 10px;
border-radius: 10px;
backdrop-filter: blur(2px);
width: fit-content;
}

.description {
box-shadow: 0px 0px 10px 5px #00000088;
width: 100%;
padding: 10px;
background-color: #00000099;
backdrop-filter: blur(5px);
border-radius: 5px;
}

.title {
font-size: 11px;
max-width: 100%;
display: flex;
justify-content: space-between;
}

.title p {
width: 50%;
}

.card-footer {
color: #ffffff88;
margin-top: 5px;
font-size: 8px;
}

.front .img {
position: absolute;
width: 100%;
height: 100%;
object-fit: cover;
object-position: center;
}

.circle {
width: 90px;
height: 90px;
border-radius: 50%;
background-color: #ffbb66;
position: relative;
filter: blur(15px);
animation: floating 2600ms infinite linear;
}

#bottom {
background-color: #ff8866;
left: 50px;
top: 0px;
width: 150px;
height: 150px;
animation-delay: -800ms;
}

#right {
background-color: #ff2233;
left: 160px;
top: -80px;
width: 30px;
height: 30px;
animation-delay: -1800ms;
}

@keyframes floating {
0% {
  transform: translateY(0px);
}

50% {
  transform: translateY(10px);
}

100% {
  transform: translateY(0px);
}
}






/**slidepar**/




/* Google Font Link */
/* Google Font Link */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins" , sans-serif;
}
.sidebar{
  position: fixed;
  left: 0;
  top: 0;
  height: 100%;
  width: 78px;
  background: #11101D;
  padding: 6px 14px;
  z-index: 99;
  transition: all 0.5s ease;
}
.sidebar.open{
  width: 250px;
}
.sidebar .logo-details{
  height: 60px;
  display: flex;
  align-items: center;
  position: relative;
}
.sidebar .logo-details .icon{
  opacity: 0;
  transition: all 0.5s ease;
}
.sidebar .logo-details .logo_name{
  color: #fff;
  font-size: 20px;
  font-weight: 600;
  opacity: 0;
  transition: all 0.5s ease;
}
.sidebar.open .logo-details .icon,
.sidebar.open .logo-details .logo_name{
  opacity: 1;
}
.sidebar .logo-details #btn{
  position: absolute;
  top: 50%;
  right: 0;
  transform: translateY(-50%);
  font-size: 22px;
  transition: all 0.4s ease;
  font-size: 23px;
  text-align: center;
  cursor: pointer;
  transition: all 0.5s ease;
}
.sidebar.open .logo-details #btn{
  text-align: right;
}
.sidebar i{
  color: #fff;
  height: 60px;
  min-width: 50px;
  font-size: 28px;
  text-align: center;
  line-height: 60px;
}
.sidebar .nav-list{
  margin-top: 20px;
  height: 100%;
}
.sidebar li{
  position: relative;
  margin: 8px 0;
  list-style: none;
}

.sidebar li .tooltip{
  position: absolute;
  top: -20px;
  left: calc(100% + 15px);
  z-index: 3;
  background: #fff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
  padding: 6px 12px;
  border-radius: 4px;
  font-size: 15px;
  font-weight: 400;
  opacity: 0;
  white-space: nowrap;
  pointer-events: none;
  transition: 0s;
}
.sidebar li:hover .tooltip{
  opacity: 1;
  pointer-events: auto;
  transition: all 0.4s ease;
  top: 50%;
  transform: translateY(-50%);
}
.sidebar.open li .tooltip{
  display: none;
}

.sidebar input{
  font-size: 15px;
  color: #FFF;
  font-weight: 400;
  outline: none;
  height: 50px;
  width: 100%;
  width: 50px;
  border: none;
  border-radius: 12px;
  transition: all 0.5s ease;
  background: #1d1b31;
}
.sidebar.open input{
  padding: 0 20px 0 50px;
  width: 100%;
}
.sidebar .bx-search{
  position: absolute;
  top: 50%;
  left: 0;
  transform: translateY(-50%);
  font-size: 22px;
  background: #1d1b31;
  color: #FFF;
}
.sidebar.open .bx-search:hover{
  background: #1d1b31;
  color: #FFF;
}
.sidebar .bx-search:hover{
  background: #FFF;
  color: #11101d;
}
.sidebar li a{
  display: flex;
  height: 100%;
  width: 100%;
  border-radius: 12px;
  align-items: center;
  text-decoration: none;
  transition: all 0.4s ease;
  background: #11101D;
}
.sidebar li a:hover{
  background: #FFF;
}
.sidebar li a .links_name{
  color: #fff;
  font-size: 15px;
  font-weight: 400;
  white-space: nowrap;
  opacity: 0;
  pointer-events: none;
  transition: 0.4s;
}
.sidebar.open li a .links_name{
  opacity: 1;
  pointer-events: auto;
}
.sidebar li a:hover .links_name,
.sidebar li a:hover i,.profile i:hover{
  transition: all 0.5s ease;
  color: #11101D;
}
.sidebar li i{
  height: 50px;
  line-height: 50px;
  font-size: 18px;
  border-radius: 12px;
}
.sidebar li.profile{
  position: fixed;
  height: 60px;
  width: 78px;
  left: 0;
  bottom: -8px;
  padding: 10px 14px;
  background: #1d1b31;
  transition: all 0.5s ease;
  overflow: hidden;
}
.sidebar.open li.profile{
  width: 250px;
}
.sidebar li .profile-details{
  display: flex;
  align-items: center;
  flex-wrap: nowrap;
}
.sidebar li img{
  height: 45px;
  width: 45px;
  object-fit: cover;
  border-radius: 6px;
  margin-right: 10px;
}
.sidebar li.profile .name,
.sidebar li.profile .job{
  font-size: 15px;
  font-weight: 400;
  color: #fff;
  white-space: nowrap;
}
.sidebar li.profile .job{
  font-size: 12px;
}
.sidebar .profile #log_out{
  position: absolute;
  top: 50%;
  right: 0;
  transform: translateY(-50%);
  background: #1d1b31;
  width: 100%;
  height: 60px;
  line-height: 60px;
  border-radius: 0px;
  transition: all 0.5s ease;
  cursor: pointer;
}
.sidebar .profile #log_out:hover{
  background-color: #E4E9F7;
  border-radius: 20px;
}
.sidebar.open .profile #log_out{
  width: 50px;
  background: none;
}
.home-section{
  position: relative;
  background: #E4E9F7;
  min-height: 100vh;
  top: 0;
  left: 78px;
  width: calc(100% - 78px);
  transition: all 0.5s ease;
  z-index: 2;
}
.sidebar.open ~ .home-section{
  left: 250px;
  width: calc(100% - 250px);
}
.home-section .text{
  display: inline-block;
  color: #11101d;
  font-size: 25px;
  font-weight: 500;
  margin: 18px
}
@media (max-width: 420px) {
  .sidebar li .tooltip{
    display: none;
  }
}



/******input*******/




</style>
<script>    /**script slide_par**/
  let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let searchBtn = document.querySelector(".bx-search");

closeBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("open");
  menuBtnChange();//calling the function(optional)
});

searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
  sidebar.classList.toggle("open");
  menuBtnChange(); //calling the function(optional)
});

// following are the code to change sidebar button(optional)
function menuBtnChange() {
 if(sidebar.classList.contains("open")){
   closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
 }else {
   closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
 }
}

</script>
</body>
</html>