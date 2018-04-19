asp = document.getElementById('asp');
            pop = document.getElementById('pop');
            popy = document.getElementById('popy');
            spp = document.getElementById('spp');
            no = document.getElementById('no');
            final = document.getElementById('final');
        
        spp.addEventListener('click',function(){
                popy.style.display='none';
            },false);
        no.addEventListener('click',function(){
                popy.style.display='none';
            },false);
        final.addEventListener('click',function(){
        popy.style.display='inherit';});
            
        $('#pop').draggable();