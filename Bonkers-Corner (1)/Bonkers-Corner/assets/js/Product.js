function increaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 1 : value;
    if(value < 10) {
      value++;
      
    }else{
      alert('maximum 10 allow')
    }
    document.getElementById('number').value = value;
  }
  
  function decreaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 1 : value;
    value < 1 ? value = 1 : '';
    // value--;
    if(value > 1) {
      value--;
    }
    document.getElementById('number').value = value;
  }


const p1 = document.getElementById('page1');
const p2 = document.getElementById('page2');

p1.addEventListener('click', () => {
    p2.classList.toggle('show');
});