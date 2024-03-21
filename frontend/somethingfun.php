<head>
    <link href="somethingfun.css" rel="stylesheet" />
</head>
<style>
    /*

Click the horse for slow-mo :)

*/

:root {
  font-size: 22vmin;
  --outlines: transparent;
  --speed: 0.8s;
  --delay-gap: 8;
  --horse-width: 3.8rem;
  --horse-height: 2.5rem;

  --color-horse: rgba(50, 50, 50, 1);
  --color-horse-back: rgba(30, 30, 30, 1);
  --color-hair: rgba(70, 70, 70, 1);


  --color-hoof: rgba(0, 0, 0, 1);
  --color-dust: #af540b;
  --color-floor: #f1d1af;
  --color-sky: #c4c4ff;
}

input[type="checkbox"] {
  opacity: 0;
}

input[type="checkbox"]:checked ~ label {
  --outlines: rgb(0, 0, 0);
  --speed: 8s;

  --color-horse: rgba(50, 50, 50, 0.3);
  --color-horse-back: rgba(30, 30, 30, 0.3);
  --color-hair: rgba(70, 70, 70, 0.3);
  --color-hoof: rgba(0, 0, 0, 0.3);
}

* {
  position: relative;
}

html,
body {
  width: 100%;
  height: 100%;
  margin: 0;
  padding: 0;
  background: linear-gradient(
    0deg,
    rgba(255, 164, 78, 1) 30%,
    rgb(198, 87, 238) 100%
  );
}

body {
  display: flex;
  justify-content: center;
  align-items: center;
}

label {
  cursor: pointer;
}

.dust {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: calc(((100vh - var(--horse-height)) / 2) + 0.02rem);
  overflow: hidden;
}

.floor {
  background-color: var(--color-floor);
  background: linear-gradient(9deg, rgba(232, 217, 190, 1) 0%, #a95108 100%);
  position: fixed;
  top: calc(50vh + (var(--horse-height) / 2) - 0.5rem);
  left: 0;
  right: 0;
  bottom: 0;
  overflow: hidden;
}

.dust .particle {
  background-color: var(--color-dust);
  width: 0.05rem;
  height: 0.05rem;
  border-radius: 50%;
  position: absolute;

  border: 1px dashed var(--outlines);
  top: calc(50vh + (var(--horse-height) / 2) - 0.05rem);
  left: calc(50vw - (var(--horse-width) / 2) + (var(--horse-width) * 0.15));
}

.dust.back .particle {
  left: calc(50vw - (var(--horse-width) / 2) + (var(--horse-width) * 0.5));
}

@for $i from 1 through 30 {
  @keyframes particle-animation-#{$i} {
    100% {
      transform: translateX(calc(#{random() / 1.3} * var(--horse-width)))
        translateY(calc(-#{random() / 100} * (var(--horse-height) / 5)))
        scale(random(4) + 2) rotate(random(360) * -0.5deg);
      opacity: 0;
    }
  }

  .particle:nth-child(#{$i}) {
    transform-origin: random(1) * -20% random(1) * -20%;
    animation: particle-animation-#{$i} var(--speed) ease-out infinite;
    animation-delay: calc((var(--speed) * 0.1) + #{$i * 0.01s});
  }

  .dust.back .particle:nth-child(#{$i}) {
    animation-delay: calc((var(--speed) * 0.68) + #{$i * 0.01s});
  }
}

.🐴 {
  width: var(--horse-width);
  height: var(--horse-height);
  border: 0px solid var(--outlines);
}

.🐴 *,
.🐴 *:after,
.🐴 *:before {
  border: 1px dashed var(--outlines);
}

.🐴 > * {
  position: absolute;
  top: var(--part-y, 0);
  left: var(--part-x, 0);
  width: var(--part-width, 10px);
  height: var(--part-height, 10px);
  border-radius: var(--part-radius, 0);
  transform: rotate(var(--part-rotate, 0deg));
  transform-origin: var(--part-origin, 50% 50%);

  animation-delay: var(--delay, 0s) !important;
}

.🐴 > * *,
.🐴 > * *:after,
.🐴 > * *:before {
  position: absolute;
  background-color: var(--color-horse);
  top: var(--shape-y, 0);
  left: var(--shape-x, 0);
  width: var(--shape-width, 10px);
  height: var(--shape-height, 10px);
  border-radius: var(--shape-radius, 0);
  transform: rotate(var(--shape-rotate, 0deg));
  transform-origin: var(--shape-origin, 50% 50%);
  animation-delay: var(--delay, 0s) !important;
}

/* ================

   HEAD

   ================ */

.head {
  --part-width: 20%;
  --part-height: 15%;
  --part-x: -1%;
  --part-y: 3%;
  --part-origin: 100% 50%;
  --part-rotate: -40deg;
  border: none;
}

.head .skull {
  --shape-width: 55%;
  --shape-height: 80%;
  --shape-radius: 50%;
  --shape-x: 43%;
  --shape-y: 10%;
  --shape-rotate: 40deg;
}

.head .eye {
  background-color: var(--color-horse-back);
  --shape-width: 6%;
  --shape-height: 10%;
  --shape-radius: 30% 100%;
  --shape-x: 45%;
  --shape-y: 20%;
  --shape-rotate: 0deg;
}

.head .face {
  --shape-width: 47%;
  --shape-height: 50%;
  --shape-y: 8%;
  --shape-x: 14%;
  --shape-rotate: -5deg;
}

.head .nose {
  --shape-x: 0%;
  --shape-y: 11.7%;
  --shape-width: 24%;
  --shape-height: 35%;
  --shape-radius: 50%;
  --shape-rotate: -12deg;
}

.head .jaw {
  --shape-width: 25%;
  --shape-height: 60%;
  --shape-x: 40%;
  --shape-y: 37%;
  --shape-radius: 45%;
  transform: skew(0deg) rotate(40deg);
}

.head .lip {
  --shape-rotate: 40deg;
  --shape-x: -3%;
  --shape-y: 28%;
  --shape-radius: 30%;
  --shape-width: 12%;
  --shape-height: 25%;
}

.head .chin {
  --shape-width: 15%;
  --shape-height: 40%;
  --shape-y: 31%;
  --shape-x: 2%;
  --shape-radius: 30%;
  --shape-rotate: 40deg;
}

.head .chin:after {
  content: "";
  --shape-width: 130%;
  --shape-height: 180%;
  --shape-radius: 0;
  --shape-x: 123%;
  --shape-y: -95%;
  --shape-rotate: 70deg;
}

.head .ear {
  --shape-width: 20%;
  --shape-height: 15%;
  --shape-y: 17%;
  --shape-x: 78%;
  --shape-radius: 50%;
  --shape-rotate: 10deg;
  --shape-origin: 0% 50%;
}

.head .ear:after {
  content: "";
  --shape-width: 70%;
  --shape-height: 40%;
  --shape-y: 10%;
  --shape-x: 65%;
  --shape-radius: 40%;
  --shape-rotate: -30deg;
}

.head .ear:before {
  content: "";
  --shape-width: 70%;
  --shape-height: 30%;
  --shape-y: -20%;
  --shape-x: 50%;
  --shape-radius: 0%;
  --shape-rotate: -5deg;
}

/* ================

   NECK

   ================ */

.neck {
  --part-width: 30%;
  --part-height: 25%;
  --part-x: 5%;
  --part-y: 35%;
  --part-origin: 90% 50%;
  --part-rotate: 45deg;
  border: none;
}

.neck .under {
  --shape-height: 40%;
  --shape-width: 16%;
  --shape-radius: 50%;
  --shape-x: 11%;
  --shape-y: 55%;
  --shape-rotate: -19deg;
  background-color: transparent;
  border-top: 0.07rem outset var(--color-horse);
}

.neck .front {
  --shape-width: 75%;
  --shape-height: 55%;
  --shape-radius: 50%;
  --shape-y: 28%;
  --shape-x: 7%;
  --shape-rotate: 20deg;
}

.neck .top {
  --shape-x: 10%;
  --shape-y: 5%;
  --shape-width: 50%;
  --shape-height: 25%;
  --shape-radius: 50% / 20%;
  --shape-rotate: 0deg;
}

.neck .top:after {
  content: "";
  --shape-x: 50%;
  --shape-y: -10%;
  --shape-width: 70%;
  --shape-height: 50%;
  --shape-radius: 0%;
  --shape-rotate: -5deg;
}

.neck .base {
  --shape-width: 50%;
  --shape-height: 30%;
  --shape-x: 20%;
  --shape-y: 10%;
  --shape-radius: 30%;
  --shape-rotate: -10deg;
}

.neck .shoulder {
  --shape-width: 50%;
  --shape-height: 30%;
  --shape-x: 48%;
  --shape-y: -2%;
  --shape-rotate: -20deg;
  --shape-radius: 50%;
}

/* ================

   BODY

   ================ */

.body {
  --part-width: 55%;
  --part-height: 33%;
  --part-x: 20%;
  --part-y: 30%;
  --part-origin: 10% 50%;
  border: none;
}

.body .section {
  --shape-width: 94%;
  --shape-height: 90%;
  --shape-x: 40%;
  --shape-y: 5%;
  --shape-origin: 10% 30%;
  --shape-radius: 50% 0 20% 20%;
  --shape-rotate: -9deg;
}

.body .section.last {
  --shape-radius: 45%;
}
.body .section.last:after {
  content: none;
}

.body > .section {
  --shape-x: 4%;
  --shape-y: 4%;
  --shape-width: 32%;
  --shape-height: 92%;
  --shape-rotate: 10deg;
  --shape-origin: 50% 50%;
  --shape-radius: 45%;
}

.body > .section:after {
  content: "";

  --shape-height: 70%;
  --shape-width: 202%;
  --shape-x: 40%;
  --shape-y: 48%;
  --shape-rotate: -23deg;
  --shape-origin: 0% 100%;
  --shape-radius: 50%;
}

.body .back-side {
  --shape-x: 60%;
  --shape-y: -10%;
  --shape-width: 38%;
  --shape-height: 70%;
  --shape-origin: 0 0;
  --shape-rotate: 8deg;
  --shape-radius: 40% 50% 50%;
}

/* ================

   TAIL

   ================ */

.tail {
  --part-width: 35%;
  --part-height: 18%;
  --part-x: 63%;
  --part-y: 29%;
  --part-rotate: 10deg;
  --part-origin: 0% 50%;
  border: none;
}

.tail .nub {
  --shape-width: 35%;
  --shape-height: 30%;
  --shape-rotate: 4deg;
  --shape-origin: 10% 50%;
  --shape-radius: 20% / 50%;

  background-color: var(--color-hair);
}

.tail .section {
  --shape-width: 100%;
  --shape-height: 90%;
  --shape-rotate: 15deg;
  --shape-origin: 0% 50%;
  --shape-radius: 30% / 50%;
  --shape-y: -25%;
  --shape-x: 60%;

  background-color: var(--color-hair);
}

.tail .section:after {
  content: "";

  --shape-width: 170%;
  --shape-height: 120%;
  --shape-rotate: 6deg;
  --shape-origin: 0% 50%;
  --shape-radius: 50%;
  --shape-y: -10%;
  --shape-x: 0%;

  background-color: transparent;
  box-shadow: -1.5vmin 0.5vmin 0 0 var(--color-hair);
}

.tail .section:before {
  content: "";

  --shape-width: 130%;
  --shape-height: 100%;
  --shape-rotate: -20deg;
  --shape-origin: 0% 50%;
  --shape-radius: 50%;
  --shape-y: 0%;
  --shape-x: 50%;

  background-color: transparent;
  box-shadow: -1.5vmin 1vmin 0 0 var(--color-hair);
}

.tail .nub > .section {
  --shape-width: 50%;
  --shape-height: 170%;
}

.tail .section > * > * {
  --shape-rotate: 0deg;
  --shape-height: 80%;
}

.tail .section > * > * > * > * {
  --shape-rotate: -25deg;
  --shape-height: 40%;
}

/* ================

   FRONT LEG

   ================ */

.front-leg {
  --part-width: 15%;
  --part-height: 60%;
  --part-x: 20%;
  --part-y: 40%;
  --part-origin: 100% 50%;
  border: none;
}

.front-leg.right {
  --color-horse: var(--color-horse-back);
  --delay: calc(0s - var(--speed) / var(--delay-gap));
}

.front-leg .shoulder {
  --shape-x: 20%;
  --shape-width: 80%;
  --shape-height: 35%;
  --shape-origin: 100% 50%;
  --shape-radius: 30% 30% 30% 50%;
  --shape-rotate: -0deg;
}

.front-leg .upper {
  --shape-x: 40%;
  --shape-y: 60%;
  --shape-width: 40%;
  --shape-height: 80%;
  --shape-origin: 40% 10%;
  --shape-radius: 30% 30% 50% 50%;
  --shape-rotate: 0deg;
}

.front-leg .upper:before {
  content: "";
  --shape-x: 5%;
  --shape-radius: 20%;
  --shape-rotate: 0deg;
}

.front-leg .upper:after {
  content: "";
  --shape-x: 40%;
  --shape-y: 60%;
  --shape-height: 78%;
  --shape-radius: 40%;
  --shape-rotate: 5deg;
}

.front-leg .knee {
  --shape-x: 0%;
  --shape-y: 120%;
  --shape-width: 57%;
  --shape-height: 55%;
  --shape-radius: 45%;
  --shape-origin: 40% 20%;
  --shape-rotate: -0deg;
}

.front-leg .knee:before {
  content: "";
  --shape-x: 0%;
  --shape-y: 60%;
  --shape-width: 30%;
  --shape-height: 40%;
  --shape-radius: 30%;
  --shape-rotate: 0deg;
}

.front-leg .lower {
  --shape-x: 0%;
  --shape-y: 80%;
  --shape-width: 54%;
  --shape-height: 120%;
  --shape-radius: 5%;
  --shape-rotate: 12deg;
}

.front-leg .ankle {
  --shape-x: -20%;
  --shape-y: 80%;
  --shape-width: 170%;
  --shape-height: 45%;
  --shape-radius: 50%;
  --shape-rotate: 20deg;
}

.front-leg .foot {
  --shape-x: -35%;
  --shape-y: 65%;
  --shape-width: 120%;
  --shape-height: 200%;
  --shape-radius: 0%;
  --shape-rotate: 30deg;

  clip-path: polygon(
    0% 0%,
    80% 0%,
    65% 20%,
    63% 30%,
    70% 45%,
    75% 55%,
    46% 90%,
    35% 95%,
    10% 70%,
    5% 50%,
    10% 25%
  );
}

.front-leg .hoof {
  --shape-x: 40%;
  --shape-y: 52%;
  --shape-width: 100%;
  --shape-height: 50%;
  --shape-radius: 0%;
  --shape-rotate: 55deg;
  background-color: var(--color-hoof);
}

/* ================

   BACK LEG

   ================ */

.back-leg {
  --part-width: 20%;
  --part-height: 70%;
  --part-x: 60%;
  --part-y: 32%;
  --part-origin: 100% 50%;
  border: none;
}

.back-leg.right {
  --color-horse: var(--color-horse-back);
  --delay: calc(0s - var(--speed) / var(--delay-gap));
}

.back-leg .top {
  --shape-height: 20%;
  --shape-width: 75%;
  --shape-radius: 45%;
  --shape-rotate: 25deg;
  --shape-x: -8%;
  background-color: transparent;
}

.back-leg .top:after {
  content: "";
  --shape-height: 140%;
  --shape-width: 40%;
  --shape-radius: 50% / 30%;
  --shape-rotate: -19deg;
  --shape-x: 55%;
  --shape-y: 20%;
  --shape-origin: 50% 10%;
}

.back-leg .top:before {
  content: "";
  --shape-height: 150%;
  --shape-width: 80%;
  --shape-radius: 50% / 60%;
  --shape-rotate: -60deg;
  --shape-x: 24%;
  --shape-y: 58%;
}

.back-leg .thigh {
  --shape-height: 140%;
  --shape-width: 22%;
  --shape-radius: 45% / 20%;
  --shape-rotate: -95deg;
  --shape-x: 75%;
  --shape-y: 172%;
  --shape-origin: 50% 0%;
}

.back-leg .thigh:before {
  content: "";
  --shape-height: 80%;
  --shape-width: 50%;
  --shape-radius: 50%;
  --shape-rotate: -15deg;
  --shape-x: -66%;
  --shape-y: -10%;
  --shape-origin: 50% 0%;
}

.back-leg .thigh:after {
  content: "";
  --shape-height: 40%;
  --shape-width: 50%;
  --shape-radius: 50%;
  --shape-rotate: 20deg;
  --shape-x: 110%;
  --shape-y: 23%;
  --shape-origin: 50% 50%;
  background-color: transparent;
  box-shadow: -1.2% 0.5% 0 0 var(--color-horse);
}

.back-leg .lower-leg {
  --shape-height: 100%;
  --shape-width: 60%;
  --shape-radius: 50% / 10%;
  --shape-rotate: 47deg;
  --shape-x: 80%;
  --shape-y: 88%;
  --shape-origin: 50% 0%;
}

.back-leg .lower-leg:after {
  content: "";
  --shape-height: 60%;
  --shape-width: 130%;
  --shape-radius: 50%;
  --shape-rotate: -25deg;
  --shape-x: -155%;
  --shape-y: 8%;
  --shape-origin: 50% 50%;
  background-color: transparent;
  box-shadow: 15px 1px 0px 0px var(--color-horse);
}

.back-leg .foot {
  --shape-x: -120%;
  --shape-y: 100%;
  --shape-width: 180%;
  --shape-height: 60%;
  --shape-radius: 0%;
  --shape-rotate: -70deg;
  clip-path: polygon(
    90% 0%,
    95% 10%,
    100% 20%,
    100% 30%,
    60% 45%,
    60% 55%,
    70% 62%,
    80% 65%,
    80% 70%,
    15% 95%,
    10% 50%,
    15% 25%,
    30% 10%,
    70% 0%
  );
}

.back-leg .hoof {
  --shape-x: -10%;
  --shape-y: 65%;
  --shape-width: 100%;
  --shape-height: 100%;
  --shape-radius: 0%;
  --shape-rotate: -5deg;
  background-color: var(--color-hoof);
}

/* ================

   ANIMATIONS

   ================ */

@keyframes body {
  0%,
  100% {
    transform: rotate(8deg) translatex(2%) translatey(-5%);
  }
  9% {
    transform: rotate(4deg) translatex(2%) translatey(0%);
  }
  18.1% {
    transform: rotate(1deg) translatex(0%) translatey(5%);
  }
  27.2% {
    transform: rotate(1deg) translatex(2%) translatey(0%) scaleX(0.92);
  }
  36.3% {
    transform: rotate(0deg) translatex(2%) translatey(-2%) scaleX(0.9);
  }
  45.4% {
    transform: rotate(2deg) translatex(2%) translatey(-3%) scaleX(0.9);
  }
  54.5% {
    transform: rotate(3deg) translatex(2%) translatey(-5%) scaleX(0.9);
  }
  63.6% {
    transform: rotate(4deg) translatex(0%) translatey(-4%) scaleX(0.9);
  }
  72.7% {
    transform: rotate(4.5deg) translatex(0%) translatey(-3%) scaleX(0.95);
  }
  81.8% {
    transform: rotate(6.5deg) translatex(0%) translatey(-5%) scaleX(0.95);
  }
  90.9% {
    transform: rotate(10deg) translatex(0%) translatey(-14%) scaleX(1);
  }
}

.animate .body {
  animation: body var(--speed) linear infinite;
}

@keyframes front-shoulder {
  0%,
  100% {
    transform: rotate(20deg) translatex(0%) translatey(6%);
  }
  8.3% {
    transform: rotate(8deg) translatex(-10%) translatey(0%);
  }
  16.6% {
    transform: rotate(0deg) translatex(-12%) translatey(-3%);
  }
  24.9% {
    transform: rotate(0deg) translatex(10%) translatey(0%);
  }
  33.3% {
    transform: rotate(-30deg) translatex(7%) translatey(-12%);
  }
  41.6% {
    transform: rotate(-30deg) translatex(11%) translatey(-10%);
  }
  49.9% {
    transform: rotate(-20deg) translatex(10%) translatey(0%);
  }
  58.3% {
    transform: rotate(-10deg) translatex(30%) translatey(-5%);
  }
  66.6% {
    transform: rotate(15deg) translatex(25%) translatey(5%);
  }
  74.9% {
    transform: rotate(0deg) translatex(0%) translatey(0%);
  }
  83.3% {
    transform: rotate(0deg) translatex(0%) translatey(0%);
  }
  91.6% {
    transform: rotate(20deg) translatex(0%) translatey(0%);
  }
}

.animate .front-leg .shoulder {
  animation: front-shoulder var(--speed) linear infinite;
}

@keyframes front-upper {
  0%,
  100% {
    transform: rotate(50deg) translatex(30%) translatey(8%);
  }
  8.3% {
    transform: rotate(45deg) translatex(40%) translatey(10%);
  }
  16.6% {
    transform: rotate(33deg) translatex(25%) translatey(10%);
  }
  24.9% {
    transform: rotate(0deg) translatex(0%) translatey(0%);
  }
  33.3% {
    transform: rotate(18deg) translatex(7%) translatey(10%);
  }
  41.6% {
    transform: rotate(-8deg) translatex(-30%) translatey(15%);
  }
  49.9% {
    transform: rotate(-4deg) translatex(-20%) translatey(10%);
  }
  58.3% {
    transform: rotate(20deg) translatex(17%) translatey(10%);
  }
  66.6% {
    transform: rotate(30deg) translatex(20%) translatey(-10%);
  }
  74.9% {
    transform: rotate(75deg) translatex(40%) translatey(-15%);
  }
  83.3% {
    transform: rotate(85deg) translatex(15%) translatey(-10%);
  }
  91.6% {
    transform: rotate(55deg) translatex(25%) translatey(-5%);
  }
}

.animate .front-leg .upper {
  animation: front-upper var(--speed) linear infinite;
}

@keyframes front-knee {
  0%,
  100% {
    transform: rotate(-15deg) translatex(0%) translatey(0%);
  }
  8.3% {
    transform: rotate(-10deg) translatex(0%) translatey(0%);
  }
  16.6% {
    transform: rotate(-12deg) translatex(0%) translatey(0%);
  }
  24.9% {
    transform: rotate(-20deg) translatex(0%) translatey(0%);
  }
  33.3% {
    transform: rotate(-55deg) translatex(-25%) translatey(10%);
  }
  41.6% {
    transform: rotate(-35deg) translatex(0%) translatey(-10%);
  }
  49.9% {
    transform: rotate(-28deg) translatex(0%) translatey(0%);
  }
  58.3% {
    transform: rotate(-90deg) translatex(-22%) translatey(0%);
  }
  66.6% {
    transform: rotate(-95deg) translatex(-30%) translatey(0%);
  }
  74.9% {
    transform: rotate(-98deg) translatex(-10%) translatey(0%);
  }
  83.3% {
    transform: rotate(-80deg) translatex(-20%) translatey(8%);
  }
  91.6% {
    transform: rotate(-50deg) translatex(-30%) translatey(10%);
  }
}

.animate .front-leg .knee {
  animation: front-knee var(--speed) linear infinite;
}

@keyframes front-lower {
  0%,
  100% {
    transform: rotate(-25deg) translatex(20%) translatey(0%);
  }
  8.3% {
    transform: rotate(10deg) translatex(0%) translatey(-10%);
  }
  16.6% {
    transform: rotate(10deg) translatex(0%) translatey(0%);
  }
  24.9% {
    transform: rotate(12deg) translatex(0%) translatey(0%);
  }
  33.3% {
    transform: rotate(-12deg) translatex(7%) translatey(-12%);
  }
  41.6% {
    transform: rotate(0deg) translatex(0%) translatey(-10%);
  }
  49.9% {
    transform: rotate(-23deg) translatex(20%) translatey(-20%);
  }
  58.3% {
    transform: rotate(0deg) translatex(0%) translatey(-30%);
  }
  66.6% {
    transform: rotate(-15deg) translatex(30%) translatey(-20%);
  }
  74.9% {
    transform: rotate(-15deg) translatex(0%) translatey(0%);
  }
  83.3% {
    transform: rotate(-15deg) translatex(15%) translatey(0%);
  }
  91.6% {
    transform: rotate(-10deg) translatex(20%) translatey(-30%);
  }
}

.animate .front-leg .lower {
  animation: front-lower var(--speed) linear infinite;
}

@keyframes front-ankle {
  0%,
  100% {
    transform: rotate(20deg) translatex(0%) translatey(0%);
  }
  8.3% {
    transform: rotate(20deg) translatex(0%) translatey(0%);
  }
  16.6% {
    transform: rotate(20deg) translatex(0%) translatey(0%);
  }
  24.9% {
    transform: rotate(20deg) translatex(0%) translatey(0%);
  }
  33.3% {
    transform: rotate(15deg) translatex(10%) translatey(0%);
  }
  41.6% {
    transform: rotate(20deg) translatex(0%) translatey(0%);
  }
  49.9% {
    transform: rotate(0deg) translatex(0%) translatey(0%);
  }
  58.3% {
    transform: rotate(0deg) translatex(0%) translatey(-20%);
  }
  66.6% {
    transform: rotate(-30deg) translatex(0%) translatey(0%);
  }
  74.9% {
    transform: rotate(-30deg) translatex(0%) translatey(0%);
  }
  83.3% {
    transform: rotate(-10deg) translatex(0%) translatey(-20%);
  }
  91.6% {
    transform: rotate(20deg) translatex(0%) translatey(0%);
  }
}

.animate .front-leg .ankle {
  animation: front-ankle var(--speed) linear infinite;
}

@keyframes front-foot {
  0%,
  100% {
    transform: rotate(-28deg) translatex(40%) translatey(0%);
  }
  8.3% {
    transform: rotate(-15deg) translatex(50%) translatey(0%);
  }
  16.6% {
    transform: rotate(-11deg) translatex(35%) translatey(0%);
  }
  24.9% {
    transform: rotate(50deg) translatex(0%) translatey(0%);
  }
  33.3% {
    transform: rotate(-10deg) translatex(50%) translatey(0%);
  }
  41.6% {
    transform: rotate(-36deg) translatex(50%) translatey(0%);
  }
  49.9% {
    transform: rotate(-30deg) translatex(32%) translatey(0%);
  }
  58.3% {
    transform: rotate(-30deg) translatex(45%) translatey(0%);
  }
  66.6% {
    transform: rotate(-30deg) translatex(50%) translatey(0%);
  }
  74.9% {
    transform: rotate(-30deg) translatex(50%) translatey(0%);
  }
  83.3% {
    transform: rotate(-30deg) translatex(50%) translatey(0%);
  }
  91.6% {
    transform: rotate(-50deg) translatex(50%) translatey(10%);
  }
}

.animate .front-leg .foot {
  animation: front-foot var(--speed) linear infinite;
}

@keyframes back-top {
  0%,
  100% {
    transform: rotate(0deg) translatex(-5%) translatey(50%);
  }
  8.3% {
    transform: rotate(-5deg) translatex(-7%) translatey(38%);
  }
  16.6% {
    transform: rotate(-10deg) translatex(-14%) translatey(30%);
  }
  24.9% {
    transform: rotate(25deg) translatex(0%) translatey(10%);
  }
  33.3% {
    transform: rotate(32deg) translatex(-18%) translatey(25%);
  }
  41.6% {
    transform: rotate(45deg) translatex(-5%) translatey(20%);
  }
  49.9% {
    transform: rotate(65deg) translatex(10%) translatey(35%);
  }
  58.3% {
    transform: rotate(65deg) translatex(10%) translatey(40%);
  }
  66.6% {
    transform: rotate(75deg) translatex(20%) translatey(40%);
  }
  74.9% {
    transform: rotate(70deg) translatex(20%) translatey(45%);
  }
  83.3% {
    transform: rotate(60deg) translatex(25%) translatey(40%);
  }
  91.6% {
    transform: rotate(30deg) translatex(10%) translatey(40%);
  }
}

.animate .back-leg .top {
  animation: back-top var(--speed) linear infinite;
}

@keyframes back-thigh {
  0%,
  100% {
    transform: rotate(-45deg) translatex(-30%) translatey(-10%);
  }
  8.3% {
    transform: rotate(-45deg) translatex(-30%) translatey(-8%);
  }
  16.6% {
    transform: rotate(-43deg) translatex(-35%) translatey(-10%);
  }
  24.9% {
    transform: rotate(-95deg) translatex(0%) translatey(0%);
  }
  33.3% {
    transform: rotate(-115deg) translatex(0%) translatey(10%);
  }
  41.6% {
    transform: rotate(-130deg) translatex(20%) translatey(-5%);
  }
  49.9% {
    transform: rotate(-130deg) translatex(10%) translatey(0%);
  }
  58.3% {
    transform: rotate(-90deg) translatex(80%) translatey(-20%);
  }
  66.6% {
    transform: rotate(-85deg) translatex(0%) translatey(-20%);
  }
  74.9% {
    transform: rotate(-65deg) translatex(5%) translatey(-10%);
  }
  83.3% {
    transform: rotate(-65deg) translatex(10%) translatey(-10%);
  }
  91.6% {
    transform: rotate(-75deg) translatex(-20%) translatey(-15%);
  }
}

.animate .back-leg .thigh {
  animation: back-thigh var(--speed) linear infinite;
}

@keyframes back-lower-leg {
  0%,
  100% {
    transform: rotate(40deg) translatex(0%) translatey(0%);
  }
  8.3% {
    transform: rotate(30deg) translatex(-30%) translatey(0%);
  }
  16.6% {
    transform: rotate(28deg) translatex(-40%) translatey(0%);
  }
  24.9% {
    transform: rotate(47deg) translatex(0%) translatey(0%);
  }
  33.3% {
    transform: rotate(78deg) translatex(0%) translatey(5%);
  }
  41.6% {
    transform: rotate(110deg) translatex(40%) translatey(10%);
  }
  49.9% {
    transform: rotate(115deg) translatex(50%) translatey(5%);
  }
  58.3% {
    transform: rotate(90deg) translatex(30%) translatey(5%);
  }
  66.6% {
    transform: rotate(76deg) translatex(0%) translatey(0%);
  }
  74.9% {
    transform: rotate(50deg) translatex(-40%) translatey(-4%);
  }
  83.3% {
    transform: rotate(40deg) translatex(-20%) translatey(-5%);
  }
  91.6% {
    transform: rotate(70deg) translatex(0%) translatey(0%);
  }
}

.animate .back-leg .lower-leg {
  animation: back-lower-leg var(--speed) linear infinite;
}

@keyframes back-foot {
  0%,
  100% {
    transform: rotate(40deg) translatex(0%) translatey(-20%);
  }
  8.3% {
    transform: rotate(20deg) translatex(10%) translatey(-20%);
  }
  16.6% {
    transform: rotate(-65deg) translatex(0%) translatey(0%);
  }
  24.9% {
    transform: rotate(-70deg) translatex(0%) translatey(0%);
  }
  33.3% {
    transform: rotate(-60deg) translatex(20%) translatey(-10%);
  }
  41.6% {
    transform: rotate(-80deg) translatex(0%) translatey(0%);
  }
  49.9% {
    transform: rotate(-70deg) translatex(0%) translatey(0%);
  }
  58.3% {
    transform: rotate(-60deg) translatex(10%) translatey(-10%);
  }
  66.6% {
    transform: rotate(-43deg) translatex(20%) translatey(-10%);
  }
  74.9% {
    transform: rotate(-13deg) translatex(5%) translatey(-10%);
  }
  83.3% {
    transform: rotate(8deg) translatex(5%) translatey(-15%);
  }
  91.6% {
    transform: rotate(20deg) translatex(15%) translatey(-20%);
  }
}

.animate .back-leg .foot {
  animation: back-foot var(--speed) linear infinite;
}

@keyframes neck {
  0%,
  100% {
    transform: scaleX(1) rotate(40deg) translatex(0%) translatey(-10%);
  }
  /* 	8.3% { 	transform: scaleX(1) rotate(40deg) translatex(2%) translatey(-10%); } */
  16.6% {
    transform: scaleX(1) rotate(40deg) translatex(6%) translatey(-10%);
  }
  /* 	24.9% { transform: scaleX(0.9) rotate(40deg) translatex(5%) translatey(-5%); } */
  33.3% {
    transform: scaleX(0.9) rotate(45deg) translatex(3%) translatey(5%);
  }
  /* 	41.6% { transform: scaleX(0.9) rotate(50deg) translatex(3%) translatey(5%); } */
  49.9% {
    transform: scaleX(0.85) rotate(45deg) translatex(3%) translatey(-5%);
  }
  /* 	58.3% { transform: scaleX(0.85) rotate(45deg) translatex(3%) translatey(-10%); } */
  66.6% {
    transform: scaleX(0.85) rotate(40deg) translatex(0%) translatey(-15%);
  }
  /* 	74.9% { transform: scaleX(0.9) rotate(34deg) translatex(0%) translatey(-15%); } */
  83.3% {
    transform: scaleX(1) rotate(35deg) translatex(0%) translatey(-15%);
  }
  /* 	91.6% { transform: scaleX(1) rotate(35deg) translatex(0%) translatey(-10%); } */
}

.animate .neck {
  animation: neck var(--speed) linear infinite;
}

@keyframes head {
  0%,
  100% {
    transform: rotate(-45deg) translatex(-5%) translatey(10%);
  }
  /* 	8.3% { 	transform: rotate(-45deg) translatex(-5%) translatey(12%); } */
  16.6% {
    transform: rotate(-45deg) translatex(0%) translatey(15%);
  }
  /* 	24.9% { transform: rotate(-43deg) translatex(0%) translatey(20%); } */
  33.3% {
    transform: rotate(-40deg) translatex(5%) translatey(23%);
  }
  /* 	41.6% { transform: rotate(-40deg) translatex(10%) translatey(23%); } */
  49.9% {
    transform: rotate(-36deg) translatex(15%) translatey(35%);
  }
  /* 	58.3% { transform: rotate(-38deg) translatex(18%) translatey(45%); } */
  66.6% {
    transform: rotate(-42deg) translatex(5%) translatey(35%);
  }
  /* 	74.9% { transform: rotate(-45deg) translatex(-5%) translatey(22%); } */
  83.3% {
    transform: rotate(-45deg) translatex(-15%) translatey(10%);
  }
  /* 	91.6% { transform: rotate(-50deg) translatex(-15%) translatey(0%); } */
}

.animate .head {
  animation: head var(--speed) linear infinite;
}

@keyframes ear {
  0%,
  100% {
    transform: rotate(25deg);
  }
  /* 	8.3% { 	transform: rotate(28deg); } */
  16.6% {
    transform: rotate(28deg);
  }
  /* 	24.9% { transform: rotate(20deg); } */
  33.3% {
    transform: rotate(24deg);
  }
  /* 	41.6% { transform: rotate(30deg); } */
  49.9% {
    transform: rotate(30deg);
  }
  /* 	58.3% { transform: rotate(30deg); } */
  66.6% {
    transform: rotate(35deg);
  }
  /* 	74.9% { transform: rotate(35deg); } */
  83.3% {
    transform: rotate(35deg);
  }
  /* 	91.6% { transform: rotate(20deg); } */
}

.animate .ear {
  animation: ear var(--speed) linear infinite;
}

@keyframes tail {
  0%,
  100% {
    transform: rotate(-10deg) translatex(-5%) translatey(38%);
  }
  /* 	8.3% { 	transform: rotate(-3deg) translatex(-5%) translatey(38%); } */
  16.6% {
    transform: rotate(-10deg) translatex(-5%) translatey(28%);
  }
  /* 	24.9% { transform: rotate(20deg) translatex(-5%) translatey(10%); } */
  33.3% {
    transform: rotate(-10deg) translatex(-10%) translatey(10%);
  }
  /* 	41.6% { transform: rotate(20deg) translatex(-10%) translatey(10%); } */
  49.9% {
    transform: rotate(-10deg) translatex(-10%) translatey(10%);
  }
  /* 	58.3% { transform: rotate(20deg) translatex(-13%) translatey(14%); } */
  66.6% {
    transform: rotate(-10deg) translatex(-10%) translatey(18%);
  }
  /* 	74.9% { transform: rotate(15deg) translatex(-13%) translatey(18%); } */
  83.3% {
    transform: rotate(-10deg) translatex(-10%) translatey(25%);
  }
  /* 	91.6% { transform: rotate(0deg) translatex(-5%) translatey(38%); } */
}

.animate .tail {
  animation: tail var(--speed) linear infinite;
}

@keyframes tail-section-1 {
  0%,
  100% {
    transform: rotate(15deg);
  }
  /* 	8.3% { 	transform: rotate(15deg); } */
  16.6% {
    transform: rotate(15deg);
  }
  /* 	24.9% { transform: rotate(10deg); } */
  33.3% {
    transform: rotate(12deg);
  }
  /* 	41.6% { transform: rotate(0deg); } */
  49.9% {
    transform: rotate(5deg);
  }
  /* 	58.3% { transform: rotate(0deg); } */
  66.6% {
    transform: rotate(0deg);
  }
  /* 	74.9% { transform: rotate(0deg); } */
  83.3% {
    transform: rotate(5deg);
  }
  /* 	91.6% { transform: rotate(5deg); } */
}

.animate .tail .section {
  animation: tail-section-1 var(--speed) linear infinite;
}

@keyframes tail-section-2 {
  0%,
  100% {
    transform: rotate(0deg);
  }
  /* 	8.3% { 	transform: rotate(-2deg); } */
  16.6% {
    transform: rotate(4deg);
  }
  /* 	24.9% { transform: rotate(-6deg); } */
  33.3% {
    transform: rotate(15deg);
  }
  /* 	41.6% { transform: rotate(50deg); } */
  49.9% {
    transform: rotate(30deg);
  }
  /* 	58.3% { transform: rotate(20deg); } */
  66.6% {
    transform: rotate(10deg);
  }
  /* 	74.9% { transform: rotate(-10deg); } */
  83.3% {
    transform: rotate(-5deg);
  }
  /* 	91.6% { transform: rotate(-10deg); } */
}

.animate .tail .section > * > * {
  animation: tail-section-2 var(--speed) linear infinite;
}

@keyframes tail-section-3 {
  0%,
  100% {
    transform: rotate(-25deg);
  }
  /* 	8.3% { 	transform: rotate(-20deg); } */
  16.6% {
    transform: rotate(-20deg);
  }
  /* 	24.9% { transform: rotate(-30deg); } */
  33.3% {
    transform: rotate(-20deg);
  }
  /* 	41.6% { transform: rotate(-70deg); } */
  49.9% {
    transform: rotate(-40deg);
  }
  /* 	58.3% { transform: rotate(20deg); } */
  66.6% {
    transform: rotate(0deg);
  }
  /* 	74.9% { transform: rotate(40deg); } */
  83.3% {
    transform: rotate(10deg);
  }
  /* 	91.6% { transform: rotate(20deg); } */
}

.animate .tail .section > * > * > * > * {
  animation: tail-section-3 var(--speed) linear infinite;
}
</style>
<title>Thank you For Visiting</title>
<style>
    #musicPlay {
        display: none;
    }
</style>
<h1 style="border: 10px solid black; text-align: center; font-size: 0.4em">
    "Achieve your dream and run like a horse, never stop running"
</h1>

<body>
    <audio src="../components/LofiMusic.ogg" id="musicPlay" loop="loop" autoplay="autoplay"></audio>
    <script type="text/javascript">
        window.onload = function () {
            document.getElementById("musicPlay");
        };
    </script>
    <input type="checkbox" id="toggle" />
    <label for="toggle">
        <div class="floor"></div>

        <div class="🐴 animate">
            <div class="front-leg right">
                <div class="shoulder">
                    <div class="upper">
                        <div class="knee">
                            <div class="lower">
                                <div class="ankle">
                                    <div class="foot">
                                        <div class="hoof"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="back-leg right">
                <div class="top">
                    <div class="thigh">
                        <div class="lower-leg">
                            <div class="foot">
                                <div class="hoof"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tail">
                <div class="nub">
                    <div class="section">
                        <div class="section">
                            <div class="section">
                                <div class="section">
                                    <div class="section">
                                        <div class="section last"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="section">
                    <div class="section">
                        <div class="section">
                            <div class="section">
                                <div class="section last"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="back-side"></div>
            </div>

            <div class="neck">
                <div class="under"></div>
                <div class="front"></div>
                <div class="base"></div>
                <div class="top"></div>
                <div class="shoulder"></div>
            </div>
            <div class="front-leg left">
                <div class="shoulder">
                    <div class="upper">
                        <div class="knee">
                            <div class="lower">
                                <div class="ankle">
                                    <div class="foot">
                                        <div class="hoof"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="back-leg left">
                <div class="top">
                    <div class="thigh">
                        <div class="lower-leg">
                            <div class="foot">
                                <div class="hoof"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="head">
                <div class="skull"></div>
                <div class="nose"></div>
                <div class="face"></div>
                <div class="lip"></div>
                <div class="jaw"></div>
                <div class="chin"></div>
                <div class="ear"></div>
                <div class="eye"></div>
            </div>
        </div>

        <div class="dust front">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>
        <div class="dust back">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>
    </label>
</body>