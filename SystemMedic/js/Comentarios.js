
let modal=document.getElementById('Modal');
var Doctores = { Ana_Sanchez : [
    { 
        DoctorName: "Ana Sanchez Rivera", 
        DoctorSelect: "Dermatología", 
        Clasificacion: "4 estrellas", 
        Comentarios: "Muy buena dermatóloga, resolvió mi problema de piel en poco tiempo." 
    }
    ],
     Diego_Martin : [
        { 
            DoctorName: "Diego Martin", 
            DoctorSelect: "Cardiologia", 
            Clasificacion: "4 estrellas", 
            Comentarios: "Es un Profesional , Fui atendido Rapido y me logro controlar mi problema respiratorio ahora puedo gozar mas tiempo con mi familia." 
        }
        ],
        
    
     Carlos_Martinez : [
    { 
        DoctorName: "Carlos Martinez Lopez", 
        DoctorSelect: "Neurología", 
        Clasificacion: "5 estrellas", 
        Comentarios: "Experto en su campo, me ha ayudado mucho con mi condición neurológica." 
    }
    ],
    
     Luis_Ramirez : [
    { 
        DoctorName: "Luis Ramirez Torres", 
        DoctorSelect: "Pediatría", 
        Clasificacion: "5 estrellas", 
        Comentarios: "Excelente pediatra, mis hijos siempre se sienten cómodos con él." 
    }
    ],
    
     Jorge_Hernandez : [
    { 
        DoctorName: "Jorge Hernandez Ruiz", 
        DoctorSelect: "Oftalmología", 
        Clasificacion: "5 estrellas", 
        Comentarios: "Muy profesional, mi visión ha mejorado mucho gracias a sus tratamientos." 
    }
    ],
     Maria_Gomez : [
    { 
        DoctorName: "Maria Gomez", 
        DoctorSelect: "Ginecologia", 
        Clasificacion: "5 estrellas", 
        Comentarios: "Muy profesional, mi visión ha mejorado mucho gracias a sus tratamientos." 
    }
    ]}
 function CommentariosShow(nombreSel){
    modal.style.top="0";
    document.getElementById('html').style.overflow="hidden";
    var Doc= Doctores[nombreSel][0];//obtenemos el primer array del item Doctores
    let ComenDOc=document.getElementById('prfCom');
    var Titulo=document.getElementById('h1Titulo');
    var Clasi=document.getElementById('prfClasi');
    Titulo.innerHTML = "Comentarios para "+Doc.DoctorName ;
    
    ComenDOc.innerHTML =Doc.Comentarios;
    Clasi.innerHTML = "Clasificacion de Servicio : "+ Doc.Clasificacion;

 
 }



       var btn_CierraModal=document.getElementById('btn_CierraModal');
       btn_CierraModal.addEventListener('click',function () {
           modal.style.top="-100vh";
           document.getElementById('html').style.overflow="auto";
       })

 