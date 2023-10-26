    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/datepicker/js/bootstrap-datepicker.js"></script>
    <script src="<?= base_url(); ?>assets/datepicker/js/bootstrap-datepicker.min.js"></script>

    <script src="<?= base_url(); ?>vendor/sbadmin2\startbootsrap-sb-admin-gh-pages/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>vendor/sbadmin2\startbootsrap-sb-admin-gh-pages/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Date picker JS -->
    <script type="text/javascript">
        $(document).ready(function () {
                $('#datepicker').datepicker({
                 //merubah format tanggal datepicker ke dd-mm-yyyy
                    format: "dd-MM-yyyy",
                    
                    todayHighlight:true,
                    startDate: '1',
                    todayBtn:true,
                    //aktifkan kode dibawah untuk melihat perbedaanya, disable baris perintah diatasa
                    //format: "dd-mm-yyyy",
                    autoclose: true
                    
                });
            });

            $(document).ready(function () {
                $('#datepicker2').datepicker({
                 //merubah format tanggal datepicker ke dd-mm-yyyy
                    format: "dd-MM-yyyy",
                    todayHighlight:true,
                    startDate: '1',
                    //aktifkan kode dibawah untuk melihat perbedaanya, disable baris perintah diatasa
                    //format: "dd-mm-yyyy",
                    autoclose: true
                });
            });

            $(document).ready(function () {
                $('#datepicker3').datepicker({
                 //merubah format tanggal datepicker ke dd-mm-yyyy
                    format: "dd-MM-yyyy",
                    
                    todayHighlight:true,
                    
                    todayBtn:true,
                    //aktifkan kode dibawah untuk melihat perbedaanya, disable baris perintah diatasa
                    //format: "dd-mm-yyyy",
                    autoclose: true
                    
                });
            });

            function calcDiff(value) {
                const datepicker = new Date($("#datepicker").val());
                const datepicker2 = new Date($("#datepicker2").val());

               //const dateOne = new Date(datepicker);
               //const dateTwo = new Date(datepicker2);

               const time = Math.abs(datepicker2 - datepicker);
               const day = Math.ceil(time / (1000*60*60*24) + 1);
                
               //console.log(day);
               document.getElementById("lama_cuti").value = day;

                
                


            }

            function GetRole(value) {
                let a;
                const jabatan =  Text($("#jabatan").val());

                switch (jabatan) {
                    case "Supervisor":
                    a = "1";
                    break;
                    case "Admin":
                    a = "2";
                    break;
                    case "Teknisi":
                    a = "3";
                    break;
                }

                document.getElementById("role").value = a;
            }
    </script>
    

</body>

</html>