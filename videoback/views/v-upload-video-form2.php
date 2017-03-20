<!-- konten -->
<section id="main" role="main" class="mt10 ml10 mr10">
	<div class="row">
        <div class="control-group" id="fields">
            <label class="control-label" for="field1">Nice Multiple Form Fields</label>
            <div class="controls"> 
                
                    <!-- entry -->
              
                    <div class="entry input-group col-xs-3">
                    <h1>Form V</h1>
                    <form role="form" action="" autocomplete="off">
                        <input class="form-control" name="nrp" type="text" placeholder="Type something" />
                        <input class="form-control" name="nama" type="text" placeholder="Nama" />
                        <button class="btn btn-sm btn-succes">submit</button>
                    	<span class="input-group-btn">
                            <button class="btn btn-success btn-add" type="button">
                                <span class="glyphicon glyphicon-plus"></span>
                            </button>
                        </span>
                    </form>
                    </div>
                    <!-- /entry -->
             
            <br>
            <small>Press <span class="glyphicon glyphicon-plus gs"></span> to add another form field :)</small>
            </div>
        </div>
	</div>
</section>

<script type="text/javascript">
    $(function()
{
    $(document).on('click', '.btn-add', function(e)
    {
        e.preventDefault();

        var controlForm = $('.controls form:first'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="glyphicon glyphicon-minus"></span>');
    }).on('click', '.btn-remove', function(e)
    {
        $(this).parents('.entry:first').remove();

        e.preventDefault();
        return false;
    });
});

</script>