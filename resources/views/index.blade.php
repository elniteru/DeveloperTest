<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="jumbotron">
                    <h1 class="display-3">Check Date</h1>
                    <div class="input-group">
                        <input type="text" class="form-control datepicker" placeholder="Input Date" aria-label="Input Date" aria-describedby="basic-addon2">
                    </div>
                    <hr class="my-4">
                    <p class="result"></p>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg btn-search" href="#" role="button">Check</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.2/moment.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $(".datepicker").datepicker();
            $(".btn-search").click(function(){
                var input_date  = moment($(".datepicker").val()).format('YYYY-MM-DD');
                var pretty_date = moment($(".datepicker").val()).format('DD MMM YYYY');
                $.ajax({
                    url         : "https://www.googleapis.com/calendar/v3/calendars/id.indonesian%23holiday%40group.v.calendar.google.com/events?key=AIzaSyAxX0-2IxJ1IrqqiwtV89WY1syxY3EpovY",
                    dataType    : 'json',
                    success     : function(data){
                        for(var index in data.items){
                            var holiday = data.items[index];
                            if(holiday.start.date == input_date || holiday.end.date == input_date){
                                $('.result').html(pretty_date + ' is ' +holiday.summary);
                                break;
                            }else{
                                $('.result').html("Nothing special in this day");
                            }
                        }
                    },
                });
            });
        });
    </script>
    </body>
</html>
