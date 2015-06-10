$(document).ready(function () 
{
    //pilih Mata Pelajaran
    //pilih KI -- kompetisi
    //pilih Metode
    //pilih indikator
    //pilih KD

    
       $.ajax({
                url: $("#pilihKecamatan").attr("href"),
                 type:'GET',
                 dataType: 'json',
                 success: function(results){
                        console.log(JSON.stringify(results));
                        $.each(results, function (i, item) {
                        $('#pilihKecamatan').append($('<option>', { 
                            value: item.KODE_WILAYAH,
                            text : item.NAMA_WILAYAH
                        }));
                    });

                  } 
                  });
    
    /*   
      $('#pilihJenis').change(function(){
          $.when(
               $.ajax({
                    url: 'http://172.16.3.101/index.php/sekolah/'+$('#pilihJenis').val(),
                     type:'GET',
                     dataType: 'html',
                     success: function(results){

                   $('#result').html(results);

                      } 
                      }),
               $.ajax({
                    url: 'http://172.16.3.101/index.php/sekolah/rekap/'+$('#pilihJenis').val(),
                     type:'GET',
                     dataType: 'json',
                     success: function(json){
                   console.log(JSON.stringify(json[0].jumlah));
                    $("#jmlsekolah").html("Jumlah : "+json[0].jumlah);
                   }
                      })
                ) 
           

            });*/
    
        
    
    $('#pilihKecamatan').change(function(){
               $.ajax({
                url: $("#pilihKelurahan").attr("href")+"/"+$('#pilihKecamatan').val(),
                 type:'GET',
                 dataType: 'json',
                 success: function(results){
                        $('#pilihKelurahan').html($('<option>',{
                            value:'null',
                            text:'-- Pilih Kelurahan --'
                        }));
                        console.log(JSON.stringify(results));
                        $.each(results, function (i, item) {
                        $('#pilihKelurahan').append($('<option>', { 
                            value: item.KODE_WILAYAH,
                            text : item.NAMA_WILAYAH
                        }));
                    });

                  } 
                  });
    }); 
    
    
    $('#cariBtn').click(function(){
               $('#result').html("<img class=\"center-block\" src=\""+CI_ROOT+"/assets/img/ajax_loading.gif\">");      
               $.ajax({
                url: $(this).attr("href")+"/"+$('#pilihJenis').val().trim()+
                     '/'+$('#pilihKecamatan').val().trim()+
                     '/'+$('#pilihKelurahan').val().trim(),
                 type:'GET',
                 dataType: 'html',
                 success: function(results){
                    $('#result').html(results);
                   
                  } 
                });
        });

        $('#tambahKurikulum').click(function(e){
          e.preventDefault();
          var id_kurikulum = $("#idKurikulum").html();
          var nama_kurikulum = $("#namaKurikulum").val();
          var nomor = $("#kurikulumTable tr:last-child td").html()[0];
          var row = 
                  '<tr> \
                      <td class="center">'+nomor+'</td> \
                      <td class="center">'+id_kurikulum+'</td> \
                      <td class="center">'+nama_kurikulum+'</td> \
                      <td class="center"> \
                        <a href="DataKurikulum/"><button class="btn btn-mini btn-warning">Sunting</button></a> \
                        <a href="hapusDataKurikulum/'+id_kurikulum+'"><button class="btn btn-mini btn-danger">Hapus</button></a> \
                      </td> \
                    </tr>';
               var id_kurikulum = $("#idKurikulum").html();
               var nama_kurikulum = $("#nama_kurikulum").val();
               $.ajax({
                 url: $(this).attr("href"),
                 type:'POST',
                 data:{'nama_syarat':$("#namaKurikulum").val()},
                 success: function(results){
                    alert('Kurikulum berhasil ditambah ! ');
                    location.reload();
                  } 
                });
        });

        $('#tambahTahunAjar').click(function(e){
          e.preventDefault();
          var id_tahun_ajar = $("#idTahunAjar").html();
          var id_kurikulum = $("#idKurikulum").val();
          var semester = $("#semester").val();
          var nama_tahun_ajar = $("#namaTahunAjar").val();
          var tahun_awal = $("#tahunAwal").val();
          var tahun_akhir = $("#tahunAkhir").val();

               $.ajax({
                 url: $(this).attr("href"),
                 type:'POST',
                 data:{'id_tahun_ajar':$("#idTahunAjar").html(),'id_kurikulum':$("#idKurikulum").val(),
                        'semester':$("#semester").val(),'nama_tahun_ajar':$("#namaTahunAjar").val(),
                        'tahun_awal':$("#tahunAwal").val(),'tahun_akhir':$("#tahunAkhir").val()},
                 success: function(results){
                    alert('Tahun Ajar berhasil ditambah ! ');
                    location.reload();
                  } 
                });
        });

        $('#tambahRombel').click(function(e){
          e.preventDefault();
          var id_rombel = $("#id_rombel").html();
          var tingkat_pendidikan = $("#tingkat_pendidikan").val();
          var nama_rombel = $("#nama_rombel").val();
          var id_tahun_ajar = $("#id_tahun_ajar").val();
          var id_ptk = $("#id_ptk").val();

               $.ajax({
                 url: $(this).attr("href"),
                 type:'POST',
                 data:{'id_rombel':$("#id_rombel").html(),'nama_rombel':$("#nama_rombel").val(), 'id_sekolah': $("#id_sekolah").html(),
                        'tingkat_pendidikan':$("#tingkat_pendidikan").val(),'id_tahun_ajar':$("#id_tahun_ajar").val(),
                        'id_ptk':$("#id_ptk").val()},
                 success: function(results){
                    alert('Kelas berhasil ditambah ! ');
                    location.reload();
                  } 
                });
        });

         $('#tambahDataMengajar').click(function(e){
         e.preventDefault();
          var id_mengajar = $("#idAbsensi").html();
          var id_rombel = $("#id_rombel").val();
          var kode_mapel = $("#kode_mapel").val();
          var id_ptk = $("#id_ptk").val();
               $.ajax({
                 url: $(this).attr("href"),
                 type:'POST',
                 data:{'id_mengajar':$("#id_mengajar").html(),
                 'id_rombel':$("#id_rombel").val(), 'kode_mapel':$("#kode_mapel").val(),
               'id_ptk':$("#id_ptk").val()},
                 success: function(results){
                    alert('Data mengajar berhasil ditambah ! ');
                    location.reload();
                  } 
                });
        });

        $('#tambahMapel').click(function(e){
          e.preventDefault();
          var kode_mapel = $("#idMapel").val();
          var nama_mapel = $("#namaMapel").val();

               $.ajax({
                 url: $(this).attr("href"),
                 type:'POST',
                 data:{'kode_mapel':$("#idMapel").val(),'nama_mapel':$("#namaMapel").val()},
                 success: function(results){
                    alert('Mata Pelajaran berhasil ditambah ! ');
                    location.reload();
                  } 
                });
        });

        $('#tambahAbsensi').click(function(e){
          e.preventDefault();
          var id_absensi = $("#idAbsensi").html();
          var jenis_absensi = $("#jenisAbsensi").val();
          var keterangan_absensi = $("#keteranganAbsensi").val();
               $.ajax({
                 url: $(this).attr("href"),
                 type:'POST',
                 data:{'id_absensi':$("#jenisAbsensi").html(),'jenis_absensi':$("#jenisAbsensi").val(),
               'keterangan_absensi':$("#keteranganAbsensi").val()},
                 success: function(results){
                    alert('Jensi Absensi berhasil ditambah ! ');
                    location.reload();
                  } 
                });
        });

         $('#tambahJenisPrestasi').click(function(e){
          e.preventDefault();
          var id_prestasi = $("#id_prestasi").html();
          var jenis_prestasi = $("#jenis_prestasi").val();
               $.ajax({
                 url: $(this).attr("href"),
                 type:'POST',
                 data:{'id_prestasi':$("#id_prestasi").html(),'jenis_prestasi':$("#jenis_prestasi").val()},
                 success: function(results){
                    alert('Data jenis prestasi berhasil ditambah ! ');
                    location.reload();
                  } 
                });
        });


        $('#editKurikulum').click(function(e){
          e.preventDefault();
          var id_kurikulum = $("#idKurikulum").html();
          var nama_kurikulum = $("#namaKurikulum").val();
          var nomor = $("#kurikulumTable tr:last-child td").html()[0];
          var row = 
                  '<tr> \
                      <td class="center">'+nomor+'</td> \
                      <td class="center">'+id_kurikulum+'</td> \
                      <td class="center">'+nama_kurikulum+'</td> \
                      <td class="center"> \
                        <a href="DataKurikulum/"><button class="btn btn-mini btn-warning">Sunting</button></a> \
                        <a href="hapusDataKurikulum/'+id_kurikulum+'"><button class="btn btn-mini btn-danger">Hapus</button></a> \
                      </td> \
                    </tr>';
               var id_kurikulum = $("#idKurikulum").html();
               var nama_kurikulum = $("#namaKurikulum").val();
               $.ajax({
                 url: $(this).attr("href"),
                 type:'POST',
                 data:{"nama_syarat":$("#idKurikulum").html(), "nama_kurikulum": $("#namaKurikulum").val()},
                 success:function(results)
                 {
                    alert('Kurikulum berhasil dirubah ! ');
                    location.reload();
                 }
                });
        });

        $('#editTahunAjar').click(function(e){
          e.preventDefault();
          var id_tahun_ajar = $("#idTahunAjar").html();
          var id_kurikulum = $("#idKurikulum").val();
          var semester = $("#semester").val();
          var nama_tahun_ajar = $("#namaTahunAjar").val();
          var tahun_awal = $("#tahunAwal").val();
          var tahun_akhir = $("#tahunAkhir").val();         
               $.ajax({
                 url: $(this).attr("href"),
                 type:'POST',
                 data:{'id_tahun_ajar':$("#idTahunAjar").html(),'id_kurikulum':$("#idKurikulum").val(),
                        'semester':$("#semester").val(),'nama_tahun_ajar':$("#namaTahunAjar").val(),
                        'tahun_awal':$("#tahunAwal").val(),'tahun_akhir':$("#tahunAkhir").val()},
                 success:function(results)
                 {
                    alert('Tahun Ajar berhasil dirubah ! ');
                    location.reload();
                 }
                });
        });

        $('#editRombel').click(function(e){
         e.preventDefault();
           e.preventDefault();
          var id_rombel = $("#id_rombel").html();
          var id_sekolah = $("#id_sekolah").html();
          var tingkat_pendidikan = $("#tingkat_pendidikan").val();
          var nama_rombel = $("#nama_rombel").val();
          var id_tahun_ajar = $("#id_tahun_ajar").val();
          var id_ptk = $("#id_ptk").val();

               $.ajax({
                 url: $(this).attr("href"),
                 type:'POST',
                 data:{'id_rombel':$("#id_rombel").html(),'nama_rombel':$("#nama_rombel").val(), 'id_sekolah': $("#id_sekolah").html(),
                        'tingkat_pendidikan':$("#tingkat_pendidikan").val(),'id_tahun_ajar':$("#id_tahun_ajar").val(),
                        'id_ptk':$("#id_ptk").val()},
                 success: function(results){
                    alert('Data kelas berhasil dirubah ! ');
                    location.reload();
                  } 
                });
        });

         $('#editMapel').click(function(e){
         e.preventDefault();
          var kode_mapel = $("#idMapel").val();
          var nama_mapel = $("#namaMapel").val();

               $.ajax({
                 url: $(this).attr("href"),
                 type:'POST',
                 data:{'kode_mapel':$("#idMapel").val(),'nama_mapel':$("#namaMapel").val()},
                 success: function(results){
                    alert('Mata Pelajaran berhasil dirubah ! ');
                    location.reload();
                  } 
                });
        });
        
         $('#editAbsensi').click(function(e){
         e.preventDefault();
          var id_absensi = $("#idAbsensi").html();
          var jenis_absensi = $("#jenisAbsensi").val();
          var keterangan_absensi = $("#keteranganAbsensi").val();
          
               $.ajax({
                 url: $(this).attr("href"),
                 type:'POST',
                 data:{'id_absensi':$("#idAbsensi").html(),
                 'jenis_absensi':$("#jenisAbsensi").val(), 
                 'keterangan_absensi' : $("#keteranganAbsensi").val()},
                 success: function(results){
                    alert('Data Absensi berhasil dirubah ! ');
                    location.reload();
                  } 
                });
        });

         $('#editJenisPrestasi').click(function(e){
         e.preventDefault();
          var id_prestasi = $("#id_prestasi").html();
          var jenis_prestasi = $("#jenis_prestasi").val();
          
               $.ajax({
                 url: $(this).attr("href"),
                 type:'POST',
                 data:{'id_prestasi':$("#id_prestasi").html(),
                 'jenis_prestasi':$("#jenis_prestasi").val()},
                 success: function(results){
                    alert('Data jenis prestasi berhasil dirubah ! ');
                    location.reload();
                  } 
                });
        });


    
});



