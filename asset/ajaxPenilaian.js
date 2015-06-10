$(document).ready(function () 
{

       $.ajax({
                url: $("#ekskul1").attr("href"),
                 type:'GET',
                 dataType: 'json',
                 success: function(results){
                        console.log(JSON.stringify(results));
                        $.each(results, function (i, item) {
                        $('#ekskul1').append($('<option>', { 
                            value: item.KODE_MAPEL,
                            text : item.NAMA_MAPEL
                        }));
                    });

                  } 
                  });

    $('#ekskul1').change(function(){
               $.ajax({
                url: $("#nilaiEkskul1").attr("href")+"/"+$('#ekskul1').val(),
                 type:'GET',
                 dataType: 'json',
                 success: function(results){
                        $('#nilaiEkskul1').html($('<option>',{
                            value:'null',
                            text:'-- Pilih Ekstrakulikuler --'
                        }));
                        console.log(JSON.stringify(results));
                        $.each(results, function (i, item) {
                        $('#nilaiEkskul1').append($('<option>', { 
                            value: item.KODE_MAPEL,
                            text : item.NAMA_MAPEL
                        }));
                    });

                  } 
                  });
    }); 
    
    $('#pilihKI').change(function(){
               $.ajax({
                url: $("#pilihMetode").attr("href")+"/"+$('#pilihKI').val(),
                 type:'GET',
                 dataType: 'json',
                 success: function(results){
                      $('#pilihMetode').html($('<option>',{
                            value:'null',
                            text:'-- Pilih Metode Penilaian --'
                        }));
                      $('#pilihIndikator').html($('<option>',{
                            value:'null',
                            text:'-- Pilih Indikator Penilaian --'
                        }));
                      $('#pilihKD').html($('<option>',{
                            value:'null',
                            text:'-- Pilih Kompetensi Dasar --'
                        }));
                        console.log(JSON.stringify(results));
                        $.each(results, function (i, item) {
                        $('#pilihMetode').append($('<option>', { 
                            value: item.ID_MASTER_PENILAIAN,
                            text : item.INDIKATOR_PENILAIAN
                        }));
                    });

                  } 
                });
    });

   
    $('#cariBtn').click(function(){
               $('#result').html("<img class=\"center-block\" src=\""+CI_ROOT+"/assets/img/ajax_loading.gif\">");      
               $.ajax({
                url: $(this).attr("href")+"/"+$('#pilihJenis').val().trim()+
                     '/'+$('#pilihMapel').val().trim()+
                     '/'+$('#pilihKI').val().trim()+
                     '/'+$('#pilihMetode').val().trim()+
                     '/'+$('#pilihIndikator').val().trim()+
                     '/'+$('#pilihKD').val().trim() ,
                 type:'GET',
                 dataType: 'html',
                 success: function(results){
                    $('#result').html(results);
                   
                  } 
                });
        });
    
});



