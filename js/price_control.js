/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

let getSelectedItem = () => {
    var select = document.getElementById('location');
    var item = select.options[select.selectedIndex].value;
    return item;
};

var locationSelect = document.getElementById('location');
var price_div = document.getElementById('price_div');
var outside_price_div = document.getElementById('outside_price_div');
var hidden_input = document.getElementById('hidden_input');

locationSelect.addEventListener('change', function () {
    var text = getSelectedItem();
    if (text === '1') {
        price_div.style.display = 'block';
        outside_price_div.style.display = 'none';
        hidden_input.name = 'outside_accra';
    }

    if (text === '2') {
        price_div.style.display = 'none';
        outside_price_div.style.display = 'block';
        hidden_input.name = 'within_accra';
    }

    if (text === '3') {
        price_div.style.display = 'block';
        outside_price_div.style.display = 'block';
    }
});

