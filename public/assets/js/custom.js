/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */

"use strict";

// modal confirmation
function submitDel(id) {
    $('#del-'+id).submit()
}

function delAll(){
    $('#delAll').submit()
}

// function sum() {
//             var tahfidz = document.getElementById('tahfidz').value;
//             var jamaah = document.getElementById('jamaah').value;
//             var kajian = document.getElementById('kajian').value;
//             var akademis = document.getElementById('akademis').value;
//             var kebersihan = document.getElementById('kebersihan').value;
//             var sosial = document.getElementById('sosial').value;
//             var prestasi = document.getElementById('prestasi').value;
//             var total = tahfidz + jamaah + kajian + akademis + kebersihan + sosial + prestasi;

//             if (!isNaN(result)) {
//                 document.getElementById('totalnilai').value = result;
//             }
//         }

// // total nilai raport
// const tahfidzIpt = document.getElementById("tahfidz");
// const jamaahIpt = document.getElementById("jamaah");
// const kajianIpt = document.getElementById("kajian");
// const akademisIpt = document.getElementById("akademis");
// const kebersihanIpt = document.getElementById("kebersihan");
// const sosialIpt = document.getElementById("sosial");
// const prestasiIpt = document.getElementById("prestasi");
// const totalIpt = document.getElementById("totalnilai");

// function calcTotal(){
//     const tahfidz = tahfidzIpt.value;
//     const jamaah = jamaahIpt.value;
//     const kajian = kajianIpt.value;
//     const akademis = akademisIpt.value;
//     const kebersihan = kebersihanIpt.value;
//     const sosial = sosialIpt.value;
//     const prestasi = prestasiIpt.value;
//     const total = tahfidz+jamaah+kajian+akademis+kebersihan+sosial+prestasi;

//     totalIpt.innerHTML = `${total.toLocaleString("id")}`;
// }
// tahfidzIpt.addEventListener("input", calcTotal);
// jamaahIpt.addEventListener("input", calcTotal);
// kajianIpt.addEventListener("input", calcTotal);
// akademisIpt.addEventListener("input", calcTotal);
// kebersihanIpt.addEventListener("input", calcTotal);
// sosialIpt.addEventListener("input", calcTotal);
// prestasiIpt.addEventListener("input", calcTotal);

// calcTotal();

// membuat dinamis clickable
// var path = location.pathname.split('/')
// var url = location.origin + '/' + path[1]

// $('ul.sidebar-menu li a').each(function(){
//     if($(this).attr('href').indexOf(url) !== -1){
//         $(this).parent().addClass('active').parent().parent('li').addClass('active')
//     }
// })
