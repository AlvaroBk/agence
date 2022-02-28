function formControl()
{  
        var land= document.getElementById('landType').value;
    if(land==1){
        document.getElementById('forum').style.display = 'block';
    
    }
    else{
        document.getElementById('forum').style.display = 'none';  
    }
}

function next()
{   document.getElementById('form1').style.display = 'none';
    document.getElementById('form2').style.display = 'block';
}

function back()
{   document.getElementById('form1').style.display = 'block';
    document.getElementById('form2').style.display = 'none';
}

function duatControl()
{
    var doc= document.getElementById('doc_type').value;
    if(doc!=1){
        document.getElementById('forum').style.display = 'block';
        document.getElementById('duat').style.display = 'none';
    
    }
    else{
        document.getElementById('forum').style.display = 'none';  
        document.getElementById('duat').style.display = 'block'; 
    }   
}

function secreControl()
{
    var doc= document.getElementById('doct').value;
    if(doc==2){
        document.getElementById('obito').style.display = 'block';
        document.getElementById('market').style.display = 'none';
       
    
    }
    else if(doc==6){
        document.getElementById('market').style.display = 'block'; 
        document.getElementById('obito').style.display = 'none'; 
    
    }  
    else{
        document.getElementById('market').style.display = 'none'; 
        document.getElementById('obito').style.display = 'none'; 
    } 

   
}

function purposeControl(){

    var purpose=document.getElementById('purpose_id').value;

    if(purpose==3){
        document.getElementById('other').style.display = 'block';
    }
    else{
        document.getElementById('other').style.display = 'none';
    }

}


function docID()
{  
        var doc= document.getElementById('id').value;
        
    if(doc==1){
       
      
        var input=document.getElementById('id_number');
        input.setAttribute('maxlength','13');
        input.setAttribute('placeholder','Apenas 13 Digitos');
       
       
    }
    if(doc==2){
        
      
        var input=document.getElementById('id_number');
        input.setAttribute('maxlength','9');
        input.setAttribute('placeholder','Apenas 9 Digitos');
    }
    if(doc==3){
       
        
        var input=document.getElementById('id_number');
        input.setAttribute('maxlength','9');
        input.setAttribute('placeholder','Apenas 9 Digitos');
    }
    if(doc==4){
       
        document.getElementById('BI').style.display = 'block';
        var input=document.getElementById('id_number');
        input.setAttribute('maxlength','12');
    }

    
}

function calendar(){
    var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("birth_date")[0].setAttribute('max', today);
   
}
function calendar1(){
    var today = new Date().toISOString().split('T')[0];
    
    document.getElementsByName("idade_movel")[0].setAttribute('max', today);
}

