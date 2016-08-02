$(document).ready(function(){
    $('.output button').on('click', function (event) {
        event.preventDefault();
        var sum = $('.output #sum').val();
        
        if ( $.isNumeric(sum) && sum >= 0 ) {
            $.ajax({
                type:"POST",
                url: '/transactions/output',
                success:function(data){
                    if ( data !== '0') {
                        var data = JSON.parse(data);
                        $.each(data, function () {
                            $('body').append('' +
                                '<div class="question_fix">' +
                                '<div class="question">' +
                                'You want to withdraw money to your <span style="color: blue;">'+this.email+'</span> account?' +
                                '<button class="yes">Yes</button>' +
                                '<br />' +
                                '<span style="color: red">You can specify a different account</span>' +
                                '<input type="text" name="email" id="specify_email">' +
                                '<button class="specify_yes">Withdraw money</button>' +
                                '<div class="close">Close</div>' +
                                '</div>' +
                                '</div>');
                        });
                        $('.question_fix').css({'height':$(window).height()});
                        $('.question .yes').on('click', function () {
                            $('.output form').submit();
                        });
                        $('.question .specify_yes').on('click', function () {
                            $('.output form label').after('<input type="hidden" name="email" id="email">');
                            $('.output #email').val($('.question #specify_email').val());
                            $('.output form').submit();
                        });
                        $('.question_fix .close').on('click', function () {
                            $('.question_fix').fadeOut();
                        })
                    } else {
                        $('body').append('' +
                            '<div class="question_fix">' +
                            '<div class="question">' +
                            'You do not have a single transaction.' +
                            '<br />' +
                            '<span style="color: red">Enter your email</span>' +
                            '<input type="text" name="email" id="specify_email">' +
                            '<button class="specify_yes">Withdraw money</button>' +
                            '<div class="close">Close</div>' +
                            '</div>' +
                            '</div>');
                        $('.question_fix').css({'height':$(window).height()});
                        $('.question .yes').on('click', function () {
                            $('.output form').submit();
                        });
                        $('.question .specify_yes').on('click', function () {
                            $('.output form label').after('<input type="hidden" name="email" id="email">');
                            $('.output #email').val($('.question #specify_email').val());
                            $('.output form').submit();
                        });
                        $('.question_fix .close').on('click', function () {
                            $('.question_fix').fadeOut();
                        })
                    }
                },
                error: function(err){
                    console.log('error');
                }
            });
        } else {
            $('.output form').submit();
        }
    });

});