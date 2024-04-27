let weight = document.getElementById('weight');
let age = document.getElementById('age');
let gender = document.getElementById('gender');
let cr = document.getElementById('cr');
let crcl = document.getElementById('crcl');
let anti_form = document.getElementById('anti_form');
let cr_v = parseInt(cr.value);;
let age_v = parseInt(age.value);
let weight_v = parseInt(weight.value);
let crcl_v = 0;
weight.addEventListener('change', ()=>{
    weight_v = parseInt(weight.value);
    calculateCrCl();
})

age.addEventListener('change', ()=>{
    age_v = parseInt(age.value);
    calculateCrCl();
})

gender.addEventListener('change', ()=>{
    calculateCrCl();
})

cr.addEventListener('change', ()=>{
    cr_v = parseInt(cr.value);
    calculateCrCl();
})
anti.addEventListener('change', ()=>{
    document.getElementById("age_f").value = age.value;
    document.getElementById("gender_f").value = gender.value;
    document.getElementById("weight_f").value = weight_v;
    document.getElementById("cr_f").value = cr_v;
    document.getElementById("anti_type").value = anti.value;
    console.log(anti.value);
    document.getElementById('crcl_form').value = crcl_v;
    console.log(anti.value);
    anti_form.submit();
    
})
function calculateCrCl(){
    
    if((!isNaN(weight_v)) && (!isNaN(age_v != 0)) && (!isNaN(cr_v) && cr_v!= 0)){
        let gender_f = 1;
        console.log("cal !!");
        
        if(gender.value == 'male'){
            console.log("male");
        }else{
            console.log("female");
            gender_f = 0.85;
        }
        crcl_v = (140 - age_v) * (weight_v) * gender_f / (72 * cr_v);
        crcl_v = Math.round(crcl_v*10, -1)/10;
        crcl.innerHTML = `CrCl:   <b>${crcl_v}</b>   mg/dL` ;
        
        anti_panel = document.getElementById("antiPanel");

        if(anti_panel.classList.contains("antiPanel-hide")){
            anti_panel.classList.remove("antiPanel-hide");
            anti_panel.classList.add("antiPanel");
        }
        
            
    }else{
        crcl_v = 0;
        crcl.innerHTML = `CrCl:    <b>${crcl_v}</b>   mg/dL` ;
    }
   
}

calculateCrCl();