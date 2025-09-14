<!-- jQuery -->
<script src="<?= base_url(); ?>admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url(); ?>admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url(); ?>admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url(); ?>admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url(); ?>admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url(); ?>admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url(); ?>admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url(); ?>admin/plugins/moment/moment.min.js"></script>
<script src="<?= base_url(); ?>admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url(); ?>admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url(); ?>admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url(); ?>admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>admin/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url(); ?>admin/dist/js/pages/dashboard.js"></script>
<!-- Select2 -->
<script src="<?= base_url(); ?>admin/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?= base_url(); ?>admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url(); ?>admin/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url(); ?>admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?= base_url(); ?>admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="<?= base_url(); ?>admin/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="<?= base_url(); ?>admin/plugins/dropzone/min/dropzone.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?= base_url(); ?>admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url(); ?>admin/plugins/chart.js/Chart.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url(); ?>admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>admin/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url(); ?>admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

<script>
    $(function() {
        // Summernote
        $('#summernote').summernote()

        bsCustomFileInput.init();

        //Initialize Select2 Elements
        $('.select2').select2({
            theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {
            'placeholder': 'mm/dd/yyyy'
        })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'YYYY-MM-DD' // Ubah format menjadi YYYY-MM-DD
        });


        //Date and time picker
        $('#reservationdatetime').datetimepicker({
            icons: {
                time: 'far fa-clock'
            }
        });

        //Date range picker
        $('#transaksi').daterangepicker({
            locale: {
                format: 'YYYY/MM/DD'
            }
        })
        $('#donasi').daterangepicker({
            locale: {
                format: 'YYYY/MM/DD'
            }
        })
        $('#pengeluaran').daterangepicker({
            locale: {
                format: 'YYYY/MM/DD'
            }
        })
        $('#donatur').daterangepicker({
            locale: {
                format: 'YYYY/MM/DD'
            }
        })
        $('#full').daterangepicker({
            locale: {
                format: 'YYYY/MM/DD'
            }
        })

        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        })

        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })

    })
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function() {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })

    // DropzoneJS Demo Code Start
    Dropzone.autoDiscover = false

    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
    var previewNode = document.querySelector("#template")
    previewNode.id = ""
    var previewTemplate = previewNode.parentNode.innerHTML
    previewNode.parentNode.removeChild(previewNode)

    var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
        url: "/target-url", // Set the url
        thumbnailWidth: 80,
        thumbnailHeight: 80,
        parallelUploads: 20,
        previewTemplate: previewTemplate,
        autoQueue: false, // Make sure the files aren't queued until manually added
        previewsContainer: "#previews", // Define the container to display the previews
        clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    })

    myDropzone.on("addedfile", function(file) {
        // Hookup the start button
        file.previewElement.querySelector(".start").onclick = function() {
            myDropzone.enqueueFile(file)
        }
    })

    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function(progress) {
        document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
    })

    myDropzone.on("sending", function(file) {
        // Show the total progress bar when upload starts
        document.querySelector("#total-progress").style.opacity = "1"
        // And disable the start button
        file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
    })

    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function(progress) {
        document.querySelector("#total-progress").style.opacity = "0"
    })

    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function() {
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
    }
    document.querySelector("#actions .cancel").onclick = function() {
        myDropzone.removeAllFiles(true)
    }
    // DropzoneJS Demo Code End
</script>

<script>
    $(document).ready(function() {
        // Fungsi untuk menangani pencarian ketika tombol ditekan
        $('.btn-sidebar').on('click', function() {
            let query = $('.form-control-sidebar').val().toLowerCase();
            filterMenu(query);
        });

        // Fungsi untuk menangani pencarian ketika mengetik
        $('.form-control-sidebar').on('input', function() {
            let query = $(this).val().toLowerCase();
            filterMenu(query);
        });

        function filterMenu(query) {
            // Iterasi setiap item menu
            $('.nav-item').each(function() {
                let itemText = $(this).text().toLowerCase();
                // Periksa apakah teks item mengandung query
                if (itemText.indexOf(query) !== -1) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }
    });
</script>

<script>
    $(document).ready(function() {
        // Function to handle search when button is clicked
        $('.search-button').on('click', function() {
            let query = $('.search-input').val().toLowerCase();
            filterTable(query);
        });

        // Function to handle search when typing
        $('.search-input').on('input', function() {
            let query = $(this).val().toLowerCase();
            filterTable(query);
        });

        function filterTable(query) {
            // Iterate each table row
            $('#spanduk tbody tr').each(function() {
                let rowText = $(this).text().toLowerCase();
                // Check if row text contains the query
                if (rowText.indexOf(query) !== -1) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }
    });
</script>

<script>
    $(document).ready(function() {
        // Function to handle search when button is clicked
        $('.search-button').on('click', function() {
            let query = $('.search-input').val().toLowerCase();
            filterTable(query);
        });

        // Function to handle search when typing
        $('.search-input').on('input', function() {
            let query = $(this).val().toLowerCase();
            filterTable(query);
        });

        function filterTable(query) {
            // Iterate each table row
            $('#donasi tbody tr').each(function() {
                let rowText = $(this).text().toLowerCase();
                // Check if row text contains the query
                if (rowText.indexOf(query) !== -1) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }
    });
</script>

<script>
    $(document).ready(function() {
        // Function to handle search when button is clicked
        $('.search-button').on('click', function() {
            let query = $('.search-input').val().toLowerCase();
            filterTable(query);
        });

        // Function to handle search when typing
        $('.search-input').on('input', function() {
            let query = $(this).val().toLowerCase();
            filterTable(query);
        });

        function filterTable(query) {
            // Iterate each table row
            $('#artikel tbody tr').each(function() {
                let rowText = $(this).text().toLowerCase();
                // Check if row text contains the query
                if (rowText.indexOf(query) !== -1) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }
    });
</script>

<script>
    $(document).ready(function() {
        // Function to handle search when button is clicked
        $('.search-button').on('click', function() {
            let query = $('.search-input').val().toLowerCase();
            filterTable(query);
        });

        // Function to handle search when typing
        $('.search-input').on('input', function() {
            let query = $(this).val().toLowerCase();
            filterTable(query);
        });

        function filterTable(query) {
            // Iterate each table row
            $('#transaksi tbody tr').each(function() {
                let rowText = $(this).text().toLowerCase();
                // Check if row text contains the query
                if (rowText.indexOf(query) !== -1) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }
    });
</script>

<script>
    $(document).ready(function() {
        // Function to handle search when button is clicked
        $('.search-button').on('click', function() {
            let query = $('.search-input').val().toLowerCase();
            filterTable(query);
        });

        // Function to handle search when typing
        $('.search-input').on('input', function() {
            let query = $(this).val().toLowerCase();
            filterTable(query);
        });

        function filterTable(query) {
            // Iterate each table row
            $('#pengeluaran tbody tr').each(function() {
                let rowText = $(this).text().toLowerCase();
                // Check if row text contains the query
                if (rowText.indexOf(query) !== -1) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }
    });
</script>