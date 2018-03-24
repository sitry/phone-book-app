<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Simple Contacts Table</title>
        <link href="<?php echo base_url('assests/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
        <link href="<?php echo base_url('assests/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <h3>Contacts</h3>
            <br />
            <button class="btn btn-success" onclick="add_contact()"><i class="glyphicon glyphicon-plus"></i> Add Contact</button>
            <br />
            <br />
            <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>first name</th>
                        <th>last name</th>
                        <th>phone</th>
                        <th>email</th> 
                        <th style="width:125px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($contacts as $contact){?>
                    <tr>
                            <td><?php echo $contact->first_name;?></td>
                            <td><?php echo $contact->last_name;?></td>
                            <td><?php echo $contact->phone;?></td>
                            <td><?php echo $contact->email;?></td>
                            <td>
                                <button class="btn btn-warning" onclick="edit_contact(<?php echo $contact->id;?>)"><i class="glyphicon glyphicon-pencil"></i></button>
                                <button class="btn btn-danger" onclick="delete_contact(<?php echo $contact->id;?>)"><i class="glyphicon glyphicon-remove"></i></button>
                            </td>
                        </tr>
                     <?php }?>
                </tbody> 
                <tfoot>
                    <tr>
                        <th>first name</th>
                        <th>last name</th>
                        <th>phone</th>
                        <th>email</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table> 
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('assests/bootstrap/js/bootstrap.min.js')?>"></script>
        <script src="<?php echo base_url('assests/datatables/js/jquery.dataTables.min.js')?>"></script>
        <script src="<?php echo base_url('assests/datatables/js/dataTables.bootstrap.js')?>"></script> 
        <!-- Bootstrap modal -->
        <div class="modal fade" id="modal_form" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title">Contact Form</h3>
                    </div>
                    <form action="" id="form" method="post" class="form-horizontal" onsubmit="save(event);" autocomplete="on">
                        <div class="modal-body form">
                            <input type="hidden" value="" name="id"/>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">first name</label>
                                    <div class="col-md-9">
                                        <input type="text" name="first_name" placeholder="first name" class="form-control requiredField" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">last name</label>
                                    <div class="col-md-9">
                                        <input type="text" name="last_name" placeholder="last name" class="form-control requiredField" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">phone</label>
                                    <div class="col-md-9">
                                        <input type="text" name="phone" placeholder="phone" class="form-control requiredField" required> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">email</label>
                                    <div class="col-md-9">
                                        <input id="email" type="email" name="email" onchange="this.setCustomValidity('');" placeholder="email" class="form-control requiredField" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" id="btnSave" class="btn btn-primary" value="save">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- End Bootstrap modal --> 
        <script type="text/javascript">
            $(document).ready( function () {
                $('#table_id').DataTable();
            } );
            var save_method; //for save method string
            var table;


            function add_contact()
            {
                save_method = 'add';
                $('#form')[0].reset(); // reset form on modals
                $('#modal_form').modal('show'); // show bootstrap modal
                //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
            }

            function edit_contact(id)
            {
                save_method = 'update';
                $('#form')[0].reset(); // reset form on modals

                //Ajax Load data from ajax
                $.ajax({
                    url : "<?php echo site_url('contacts/ajax_edit/')?>/" + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data)
                    {
                        $('[name="id"]').val(data.id);
                        $('[name="first_name"]').val(data.first_name);
                        $('[name="last_name"]').val(data.last_name);
                        $('[name="phone"]').val(data.phone);
                        $('[name="email"]').val(data.email);


                        $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                        $('.modal-title').text('Edit Contact'); // Set title to Bootstrap modal title

                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error get data from ajax');
                    }
                });
            }

            function save(event)
            {
                event.preventDefault();
                var url;
                if(save_method == 'add')
                {
                    url = "<?php echo site_url('contacts/contact_add')?>";
                }
                else
                {
                  url = "<?php echo site_url('contacts/contact_update')?>";
                }
                if($('#form')[0].checkValidity())
                {
                // ajax adding data to database
                    $.ajax({
                        url : url,
                        type: "POST",
                        data: $("#form").serialize(),
                        dataType: "JSON",
                        //contentType: 'application/json; charset=utf-8',
                        success: function(data)
                        {
                            if(data.status===false)
                            {
                                var email = document.getElementById("email");
                                email.setCustomValidity("the email is already registered");
                                return;
                            }
                            
                            //if success close modal and reload ajax table
                            $('#modal_form').modal('hide');
                            location.reload();// for reload a page
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            alert('Error adding / update data');
                        }
                    });
                }
                else
                {
                    return false;
                }
            }

            function delete_contact(id)
            {
                if(confirm('Are you sure delete this data?'))
                {
                // ajax delete data from database
                    $.ajax({
                        url : "<?php echo site_url('contacts/contact_delete')?>/"+id,
                        type: "POST",
                        dataType: "JSON",
                        success: function(data)
                        {

                           location.reload();
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            console.log(errorThrown);
                            alert('Error deleting data');
                        }
                    });
                }
            }

        </script>
    </body>
</html>