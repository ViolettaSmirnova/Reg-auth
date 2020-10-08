"use strict";

let traffic  = {
  elem: document.querySelector(".box"),
  redLight: document.querySelector(".red"),
  yellowLight: document.querySelector(".yellow"),
  greenLight: document.querySelector(".green"),

  turnRed: function() {
    return new Promise(function(resolve, reject) { 
    traffic.redLight.style.backgroundColor = "red";
    traffic.yellowLight.style.backgroundColor = "";
    traffic.greenLight.style.backgroundColor = "";
    setTimeout(function() {
      resolve();
    },2000);
    });
  },
  turnYellow: function() {
    return new Promise(function(resolve, reject) { 
    traffic.redLight.style.backgroundColor = "";
    traffic.yellowLight.style.backgroundColor = "yellow";
    traffic.greenLight.style.backgroundColor = "";
    setTimeout(function() {
      resolve();
    },2000);
    });
  },
  turnGreen: function() {
    return new Promise(function(resolve, reject) {
    traffic.redLight.style.backgroundColor = "";
    traffic.yellowLight.style.backgroundColor = "";
    traffic.greenLight.style.backgroundColor = "green";
    setTimeout(function() {
      resolve();
    },2000);
    });
  },

  /*startWorking: function() {
    traffic.turnRed();// адская пирамида коллбэков  
    setTimeout(function() {
      traffic.turnYellow()
      setTimeout(function() {
        traffic.turnGreen();
        setTimeout(function() {
          traffic.startWorking();
        }, 2000);
      },2000);
    },2000);
  },*/
  startWorking: function () {
    traffic.turnRed()
      .then(function() {return traffic.turnYellow()})
      .then(function() {return traffic.turnGreen()})
      .then(function() {return traffic.turnYellow()})
      .then(function() {return traffic.startWorking()});
  }
};
traffic.startWorking();
function makePromise() {
  return new Promise(function(resolve, reject) {
    setTimeout(function() {
      resolve(); // запускает метод .then
    },1500)
    setTimeout(function() {
      reject();
    },1000)
  })
} 

makePromise()
.then(function() {console.log("Промис отработал!")})
.catch(function() {console.log("Промис завершился с ошибкой!")})
.finally(function() {console.log("Промис завершился!")});

