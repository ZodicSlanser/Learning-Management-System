<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="generate.css">
    <title>Generate</title>
</head>
<body>
    <style>* {
        box-sizing: border-box;
    }
    body {
        background: #fff;
        font-family: "Noto Sans", sans-serif;
        color: #444;
        font-size: 14px;
    }
    aside.context {
        text-align: center;
        color: #333;
        line-height: 1.7;
    }
    aside.context a {
        text-decoration: none;
        color: #333;
        padding: 3px 0;
        border-bottom: 1px dashed;
    }
    aside.context a:hover {
        border-bottom: 1px solid;
    }
    aside.context .explanation {
        max-width: 700px;
        margin: 6em auto 0;
    }
    footer {
        text-align: center;
        margin: 4em auto;
        width: 100%;
    }
    footer a {
        text-decoration: none;
        display: inline-block;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: transparent;
        border: 1px dashed #333;
        color: #333;
        margin: 5px;
    }
    footer a:hover {
        background: rgba(255, 255, 255, 0.1);
    }
    footer a .icons {
        margin-top: 12px;
        display: inline-block;
        font-size: 20px;
    }
    .main-content {
        display: grid;
        min-height: 100vh;
        grid-template-rows: repeat(2, 45px) 115px 60px auto;
        max-width: 100%;
    }
    .main-content > div {
        max-width: 100%;
    }
    .title {
        background: #217346;
        text-align: center;
        display: grid;
        place-content: center;
        color: #fff;
    }
    .menu-bar {
        display: grid;
        grid-template-columns: repeat(10, max-content);
        padding: 15px;
        grid-gap: 30px;
        background: #f3f2f1;
    }
    .menu-bar div:nth-child(2) span {
        display: inline-block;
        position: relative;
        border-bottom: 5px solid #217346;
        padding-bottom: 6px;
        font-weight: 700;
    }
    .cell-content {
        border: 1px solid #e6e6e6;
        background: #e6e6e6;
        display: grid;
        padding: 10px;
        grid-template-columns: 50px auto;
    }
    .cell-content div {
        border: 1px solid #cdcdcd;
        background: #fff;
        display: flex;
        align-items: center;
    }
    .cell-content div:nth-child(1) {
        justify-content: center;
        color: #999;
        font: italic 700 18px "Merriweather", serif;
        border-right: none;
    }
    .cells {
        position: relative;
        display: grid;
        grid-template-columns: 40px repeat(11, calc((100% - 50px) / 11));
        grid-template-rows: repeat(21, 25px);
        grid-gap: 1px;
        background: #cdcdcd;
        grid-auto-flow: dense;
        max-width: 100%;
        overflow: hidden;
    }
    .cells__spacer {
        background: #e6e6e6;
        position: relative;
    }
    .cells__spacer:after {
        content: "";
        position: absolute;
        right: 4px;
        bottom: 4px;
        height: 80%;
        width: 100%;
        background: linear-gradient(135deg, transparent 30px, #bbb 30px, #bbb 55px, transparent 55px);
    }
    .cells__alphabet {
        background: #e6e6e6;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .cells__number {
        background: #e6e6e6;
        grid-column: 1 / span 1;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .cells__input {
        border: #03ff74;
        padding: 0 6px;
    }
    .cells input, .cells button {
        border: #03ff74;
        background: #fff;
        padding: 0 6px;
        font-family: 'Noto Sans', sans-serif;
    }
    .input__explanation {
        grid-column: 3 / span 2;
        grid-row: 15;
    }
    .input__see-more {
        grid-column: 5;
        grid-row: 15;
        text-align: left;
        padding: 6px;
        background: #fff;
    }
    
    input:hover{
        border: 2px solid #03ff74;
        cursor: pointer;   
    }
    .input__sm-1, .input__sm-2, .input__sm-3 {
        text-align: center;
        padding: 6px;
        grid-row: 15;
        background: #fff;
    }
    .input__sm-1 {
        grid-column: 8;
    }
    .input__sm-2 {
        grid-column: 9;
    }
    .input__sm-3 {
        grid-column: 10;
    }
    .icon-bar {
        background: #f3f2f1;
        box-shadow: 0 3px 5px rgba(0, 0, 0, 0.1);
        position: relative;
        display: grid;
        padding: 10px 15px;
        grid-template-columns: repeat(6, max-content);
        grid-template-rows: auto 35px;
        grid-auto-flow: dense;
    }
    .icon-bar > div {
        display: grid;
        grid-template-rows: repeat(2, 30px) 30px;
        border-right: 1px solid #cdcdcd;
        grid-gap: 5px;
    }
    .icon-bar__name {
        font-size: 12px;
        text-align: center;
        align-self: end;
        margin-bottom: 3px;
    }
    .icon-bar .icon-desc {
        margin-top: 5px;
        line-height: 1.15;
        font-size: 13px;
    }
    .icon-bar .icon {
        background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/567707/spriteExcel.png);
    }
    .icon-bar__clipboard {
        grid-template-columns: 50px 30px;
        padding-right: 10px;
    }
    .icon-bar__clipboard .icon-bar__name {
        grid-column: 1 / span 2;
    }
    .icon-bar__clipboard .icon-paste {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        grid-row: 1 / span 2;
    }
    .icon-bar__clipboard .icon-paste .icon {
        background-position: -30px -60px;
        height: 45px;
        width: 100%;
    }
    .icon-bar__clipboard .icon-paste span {
        margin-top: 5px;
        display: block;
    }
    .icon-bar__clipboard .icon-cut {
        background-position: 0 0;
    }
    .icon-bar__clipboard .icon-copy {
        background-position: -30px 0;
    }
    .icon-bar__font {
        padding: 0 10px;
        grid-template-columns: repeat(3, 30px) 40px repeat(2, 30px);
        justify-content: space-around;
    }
    .icon-bar__font .icon-bar__name {
        grid-column: 1 / span 5;
    }
    .icon-bar__font select {
        height: 25px;
    }
    .icon-bar__font select:nth-child(1) {
        grid-column: 1 / span 4;
    }
    .icon-bar__font select:nth-child(1) option {
        font-family: var(--font);
    }
    .icon-bar__font select:nth-child(2) {
        margin-left: -6px;
        grid-column: 5 / span 2;
    }
    .icon-bar__font .icon-bold {
        background-position: -30px -150px;
    }
    .icon-bar__font .icon-italic {
        background-position: -60px -150px;
    }
    .icon-bar__font .icon-underline {
        background-position: -90px -150px;
        border-right: 1px solid #cdcdcd;
        margin-right: -2px;
    }
    .icon-bar__font .icon-border {
        background-position: -60px 0;
        margin: 0 5px;
    }
    .icon-bar__font .icon-fill {
        background-position: -90px 0;
        border-left: 1px solid #cdcdcd;
        margin-left: -2px;
    }
    .icon-bar__font .icon-color {
        background-position: -120px 0;
    }
    .icon-bar__alignment {
        padding: 0 10px;
        grid-template-columns: repeat(5, 30px) 160px;
    }
    .icon-bar__alignment .icon-bar__name {
        grid-column: 1 / span 6;
    }
    .icon-bar__alignment .icon-alignt {
        background-position: -150px 0;
    }
    .icon-bar__alignment .icon-alignm {
        background-position: -180px 0;
    }
    .icon-bar__alignment .icon-alignb {
        background-position: -210px 0;
    }
    .icon-bar__alignment .icon-orientation {
        background-position: -240px 0;
        border-left: 1px solid #cdcdcd;
    }
    .icon-bar__alignment .icon-alignl {
        background-position: 0 -30px;
        grid-column: 1;
    }
    .icon-bar__alignment .icon-alignc {
        background-position: -30px -30px;
    }
    .icon-bar__alignment .icon-alignr {
        background-position: -60px -30px;
    }
    .icon-bar__alignment .icon-indentinc {
        background-position: -90px -30px;
        border-left: 1px solid #cdcdcd;
    }
    .icon-bar__alignment .icon-indentdec {
        background-position: -120px -30px;
    }
    .icon-bar__alignment .wrap-text, .icon-bar__alignment .merge-center {
        grid-column: 6;
        border-left: 1px solid #cdcdcd;
        padding-left: 5px;
        display: flex;
        align-items: center;
    }
    .icon-bar__alignment .wrap-text .icon, .icon-bar__alignment .merge-center .icon {
        width: 30px;
        height: 30px;
    }
    .icon-bar__alignment .wrap-text span, .icon-bar__alignment .merge-center span {
        display: block;
        padding-left: 5px;
    }
    .icon-bar__alignment .wrap-text {
        grid-row: 1;
    }
    .icon-bar__alignment .wrap-text .icon {
        background-position: -270px 0;
    }
    .icon-bar__alignment .merge-center .icon {
        background-position: -150px -30px;
    }
    .icon-bar__number {
        grid-template-columns: repeat(5, 30px);
        padding: 0 10px;
    }
    .icon-bar__number select {
        grid-column: span 5;
        height: 25px;
    }
    .icon-bar__number .icon-acc {
        background-position: -180px -30px;
    }
    .icon-bar__number .icon-percent {
        background-position: -210px -30px;
    }
    .icon-bar__number .icon-comma {
        background-position: -240px -30px;
    }
    .icon-bar__number .icon-decimalinc {
        background-position: -270px -30px;
        border-left: 1px solid #cdcdcd;
    }
    .icon-bar__number .icon-decimaldec {
        background-position: 0 -60px;
    }
    .icon-bar__number .icon-bar__name {
        grid-column: span 5;
    }
    .icon-bar__styles {
        grid-template-columns: 80px 70px 60px;
        padding: 0 10px;
        text-align: center;
    }
    .icon-bar__styles .icon-bar__name {
        grid-column: span 3;
    }
    .icon-bar__styles .icon {
        width: 45px;
        height: 45px;
        margin: -8px auto 5px;
    }
    .icon-bar__styles .conditional .icon {
        background-position: -75px -60px;
    }
    .icon-bar__styles .format-table .icon {
        background-position: -120px -60px;
    }
    .icon-bar__styles .cell-style .icon {
        background-position: -165px -60px;
    }
    .icon-bar__cells {
        grid-template-columns: repeat(3, 50px);
        padding: 0 10px;
        text-align: center;
    }
    .icon-bar__cells .icon-bar__name {
        grid-column: span 3;
    }
    .icon-bar__cells .icon {
        width: 45px;
        height: 45px;
        margin: -8px auto 5px;
    }
    .icon-bar__cells .cell-insert .icon {
        background-position: -210px -60px;
    }
    .icon-bar__cells .cell-delete .icon {
        background-position: -255px -60px;
    }
    .icon-bar__cells .cell-format .icon {
        background-position: -30px -105px;
    }
    </style>
    <div class="main-content">
        @foreach ($ncourses as $ncourse)
        <div class="title">{{$ncourse ->name}}</div>
        @endforeach



        <div class="menu-bar">
          
        </div>
        <div class="icon-bar">
          <div class="icon-bar__clipboard">
            <div class="icon-paste">
              <div class="icon" style="margin-top: -50px">


                <form action="" method="">
                    <button name="download" type="submit" style="margin-top: 60px;margin-left: -20px;background-color: cornflowerblue;cursor: pointer;">Download<button>
                </form>



            </div>
            
              </div>
            <div class="icon icon-cut"></div>
            <div class="icon icon-copy"></div>
            <div class="icon-bar__name">Clipboard</div>
          </div>
          <div class="icon-bar__font">
            <select class="font-name">
              <option selected="selected">Noto Sans</option>
              <option style="--font:Arial">Arial</option>
              <option style="--font:Calibri">Calibri</option>
              <option style="--font:Comic Sans MS">Comic Sans MS</option>
              <option style="--font:Courier New">Courier New</option>
              <option style="--font:Impact">Impact</option>
              <option style="--font:Georgia">Georgia</option>
              <option style="--font:Garamond">Garamond</option>
              <option style="--font:Lato">Lato</option>
              <option style="--font:Open Sans">Open Sans</option>
              <option style="--font:Palatino">Palatino</option>
              <option style="--font:Verdana">Verdana</option>
            </select>
            <select class="font-size">
              <option selected="selected">14</option>
              <option>16</option>
              <option>18</option>
              <option>20</option>
              <option>22</option>
              <option>24</option>
              <option>26</option>
              <option>28</option>
              <option>36</option>
              <option>48</option>
              <option>72</option>
            </select>
            <div class="icon icon-bold"></div>
            <div class="icon icon-italic"></div>
            <div class="icon icon-underline"></div>
            <div class="icon icon-border"></div>
            <div class="icon icon-fill"></div>
            <div class="icon icon-color"></div>
            <div class="icon-bar__name">Font</div>
          </div>
          <div class="icon-bar__alignment">
            <div class="icon icon-alignt"></div>
            <div class="icon icon-alignm"></div>
            <div class="icon icon-alignb"></div>
            <div class="icon icon-orientation"></div>
            <div class="icon icon-alignl"></div>
            <div class="icon icon-alignc"></div>
            <div class="icon icon-alignr"></div>
            <div class="icon icon-indentinc"></div>
            <div class="icon icon-indentdec"></div>
            <div class="wrap-text">
              <div class="icon"></div><span>Wrap Text</span>
            </div>
            <div class="merge-center">
              <div class="icon"></div><span>Merge & Center</span>
            </div>
            <div class="icon-bar__name">Alignment</div>
          </div>
          <div class="icon-bar__number">
            <select class="number-format">
              <option>General</option>
              <option>Number</option>
              <option>Currency</option>
              <option>Accounting</option>
              <option>Short Date</option>
              <option>Long Date</option>
              <option>Time</option>
              <option>Currency</option>
              <option>Percentage</option>
            </select>
            <div class="icon icon-acc"></div>
            <div class="icon icon-percent"></div>
            <div class="icon icon-comma"></div>
            <div class="icon icon-decimalinc"></div>
            <div class="icon icon-decimaldec"></div>
            <div class="icon-bar__name">Number</div>
          </div>
          <div class="icon-bar__styles">
            <div class="conditional">
              <div class="icon"></div>
            </div>
            <div class="format-table">
              <div class="icon"></div>
            </div>
            <div class="cell-style">
              <div class="icon"></div>
            </div>
            <div class="icon-desc">Conditional Formatting</div>
            <div class="icon-desc">Format as Table</div>
            <div class="icon-desc">Cell Styles</div>
            <div class="icon-bar__name">Styles</div>
          </div>
          <div class="icon-bar__cells">
            <div class="cell-insert"> 
              <div class="icon"></div>
            </div>
            <div class="cell-delete">
              <div class="icon"></div>
            </div>
            <div class="cell-format">
              <div class="icon"></div>
            </div>
            <div class="icon-desc">    
            </div>
            <div class="icon-desc"><a href="{{route('courses.index')}}"><button style="background-color: cornflowerblue;cursor: pointer;">courses</button></a>
            </div>
            <div class="icon-desc">Format</div>
            <div class="icon-bar__name">Cells</div>
          </div>
        </div>
        <div class="cell-content">
          <div>fx</div>
          <div></div>
        </div>
        <div class="cells">
          <div class="cells__spacer"></div>
          <div class="cells__alphabet">Acadimic_Number</div>
          <div class="cells__alphabet">Name_Students</div>
          <div class="cells__alphabet">C</div>
          <div class="cells__alphabet">D</div>
          <div class="cells__alphabet">E</div>
          <div class="cells__alphabet">F</div>
          <div class="cells__alphabet">G</div>
          <div class="cells__alphabet">H</div>
          <div class="cells__alphabet">I</div>
          <div class="cells__alphabet">J</div>
          <div class="cells__alphabet">K</div>
          <div class="cells__number">1</div>
          <div class="cells__number">2</div>
          <div class="cells__number">3</div>
          <div class="cells__number">4</div>
          <div class="cells__number">5</div>
          <div class="cells__number">6</div>
          <div class="cells__number">7</div>
          <div class="cells__number">8</div>
          <div class="cells__number">9</div>
          <div class="cells__number">10</div>
          <div class="cells__number">11</div>
          <div class="cells__number">12</div>
          <div class="cells__number">13</div>
          <div class="cells__number">14</div>
          <div class="cells__number">15</div>
          <div class="cells__number">16</div>
          <div class="cells__number">17</div>
          <div class="cells__number">18</div>
          <div class="cells__number">19</div>
          <div class="cells__number">20</div>
          <div class="cells__number">21</div>
          <div class="cells__number">22</div>
          <div class="cells__number">23</div>
          <div class="cells__number">24</div>


@foreach ($information as $info)
    
          <input  class="cells__input" value="{{$info->student->academic_number}}"/>
          <input class="cells__input" value="{{$info->student->name}}"/>
          <form action="" method="post">
            @csrf
            @method('Delete')
          <input type="submit" value="delete" style=" font-weight: bold; cursor: pointer;background-color: rgb(183, 0, 0);width: 127px;height: 25px"/>
          </form> 
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
@endforeach
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          <input class="cells__input"/>
          
        </div>
     
</body>
</html>