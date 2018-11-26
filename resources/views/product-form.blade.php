<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.min.js"></script>

    <style>
        .progress {
            position: relative;
            width: 100%;
            border: 1px solid #7F98B2;
            padding: 1px;
            border-radius: 3px;
        }

        .bar {
            background-color: #B4F5B4;
            width: 0%;
            height: 25px;
            border-radius: 3px;
        }

        .percent {
            position: absolute;
            display: inline-block;
            top: 3px;
            left: 48%;
            color: #7F98B2;
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
</head>
<body>


<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Simple Vuejs Form Validation with Laravel - ItSolutionStuff.com</div>


                <div class="panel-body" id="app">
                    <form method="POST" action="/vuejs/form" class="form-horizontal" @submit.prevent="onSubmit">
                        {{ csrf_field() }}
                        <div :class="['form-group', allerros.name ? 'has-error' : '']">
                            <label for="name" class="col-sm-4 control-label">Name</label>
                            <div class="col-sm-6">
                                <input id="name" name="name" value="" autofocus="autofocus" class="form-control"
                                       type="text" v-model="form.name">
                                <span v-if="allerros.name"
                                      :class="['label label-danger']">@{{ allerros.name[0] }}</span>
                            </div>
                        </div>
                        <div :class="['form-group', allerros.comments ? 'has-error' : '']">
                            <label for="comments" class="col-sm-4 control-label">Message</label>
                            <div class="col-sm-6">
                                <input id="comments" name="comments" class="form-control" type="comments"
                                       v-model="form.comments">
                                <span v-if="allerros.comments" :class="['label label-danger']">@{{ allerros.comments[0] }}</span>
                            </div>
                        </div>
                        <input name="file" id="poster" type="file" class="form-control"><br/>
                        <div class="progress">
                            <div class="bar"></div>
                            <div class="percent">0%</div>
                        </div>
                        <span v-if="success" :class="['label label-success']">Record submitted successfully!</span>
                        <button type="submit" class="btn btn-primary">
                            Send
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>

<script type="text/javascript">

    function validate(formData, jqForm, options) {
        var form = jqForm[0];
        if (!form.file.value) {
            alert('File not found');
            return false;
        }
    }

    (function () {

        var bar = $('.bar');
        var percent = $('.percent');
        var status = $('#status');

        $('form').ajaxForm({
            beforeSubmit: validate,
            beforeSend: function () {
                status.empty();
                var percentVal = '0%';
                var posterValue = $('input[name=file]').fieldValue();
                bar.width(percentVal);
                percent.html(percentVal);
            },
            uploadProgress: function (event, position, total, percentComplete) {
                var percentVal = percentComplete + '%';
                bar.width(percentVal);
                percent.html(percentVal);
            },
            success: function () {
                var percentVal = 'Wait, Saving';
                bar.width(percentVal);
                percent.html(percentVal);
            },
            complete: function (xhr) {
                status.html(xhr.responseText);
                alert('Uploaded Successfully');
                window.location.href = "/products";
            }
        });

    })();
</script>
</body>
</html>
