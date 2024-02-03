

function move(CounterEnd) {
    var CounterEnd;
    var elem = document.getElementById("progressBarFill");
    var percentText = document.getElementById("text");

    var counter = 1;
    var id = setInterval(frame, 100);
    function frame() {
      if (counter >= CounterEnd) {
        clearInterval(id);
     
      } else {
    
        counter++;
        elem.style.width =  counter + '%';
        percentText.innerHTML =  counter;
       
      }
    }
}