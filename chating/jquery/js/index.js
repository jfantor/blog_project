$(document).ready(function(){
    // $('#sname , #sclass').focus(function(){
    //     $(this).css('background','red');
    // });
    // $('#sname , #sclass').blur(function(){
    //     $(this).css('background','');
    // });
    // $('#scontry').change(function(){
    //     // $(this).css('background','pink');
    //     var a = $(this).val();
    //     $('#test').html(a);
    // });
    // $('#sname , #sclass ,#scontry').select(function(){
    //     $(this).css('background','yellow');
    // });
    // $('#sform').submit(function(){
    //     alert("form submitted");
    // });
    
});
// frome event end heare---------
// window event start -----
$(document).ready(function(){
    $('#boxs').scroll(function(){
        console.log("you are scrolling .");
    });
    $(window).resize(function(){
        console.log("you are resizeing .");
    });
});
// get method start ---
$(document).ready(function(){
    // var a = $('#get').attr('class');
    // console.log(a);
    // $('#sform').submit(function(){
    //     var name = $('#sname').val();

    //     var classname = $('#sclass').val();

    //     var countryname = $('#scontry').val();

    //     alert("hello" + name + "class name :" +classname+"country name :" + countryname) ;
    // });
});
// set method ------------
$(document).ready(function(){
    $('#click_btn').click(function(){
        $('#set h2').text("hello jf");
    });
    $('#click_btn').click(function(){
        $('#set p').html("this is <b>para graph</b>");
    });
    $('#click_btn').click(function(){
        $('#set h2').attr("class","red");
    });


});
$(document).ready(function(){
    $('#tname').val("yahoo Baba");
    $('#tclass').val("btech");

});


// class methods--------------

$('#add').click(function(){
    $('#class-meth').addClass("first");
});
$('#remove').click(function(){
    $('#class-meth').removeClass("first");
});
$('#toggle').click(function(){
    $('#class-meth').toggleClass("first");
});
// css method-----------
$(document).ready(function(){
    $("#add-style").click(function(){
        $('#addcss').css("background","pink");
    });
});
// append prepend method------------

$(document).ready(function(){
    $("#append").click(function(){
        $('#append-meth').append("<h2>jf antor</h2>");
    });
    $("#prepend").click(function(){
        $('#append-meth').prepend("<h3>jf antor</h3>");
    });
});
// after befor method--------------
$(document).ready(function(){
    $('#after').click(function(){
        $('#befor-div').after("<h3>this is heding after</h3>");
    });
    $('#befor').click(function(){
        $('#befor-div').before("<h3>this is heding after</h3>");
    });
});
// remove empty method----------

$(document).ready(function(){
    $('#empty').click(function(){
        $('#remove-div').empty();
    });
    $('#remove-btn').click(function(){
        $('#remove-div').remove();
    });
});
// append-to prepend-to method----------
$(document).ready(function(){
    $('#append-to-btn').click(function(){
        $('<h1>AppendTo : jf jio</h1>').appendTo('#append-to');
    });
    $('#prepend-to').click(function(){
        $('<h1>AppendTo : jf jio</h1>').prependTo('#append-to');
    });

});
// clone method ------------
$(document).ready(function(){
    $('#clone-btn').click(function(){
        $('#clone h1').clone().prependTo("#clone-item");
    });
    $('#clone-btn').click(function(){
        $('#clone p').clone().appendTo("#clone-item");
    });
});
// replace method-------------
$(document).ready(function(){
    $('#replaceBtn').click(function(){
        // $('#replace p:first').replaceWith('<h3>this is replace heading</h3>');
        $("<h3>this is replace heading</h3>").replaceAll('#replace p');
    });
});
// wrap method------
$(document).ready(function(){
    $('#wrap').click(function(){
        $('#wrap-meth p').wrap('<div class="scound"></div>');
    });
    $('#unwrap-meth').click(function(){
        $('#wrap-meth p').unwrap();
    });
});
// wrap all method----------
$(document).ready(function(){
    $("#wrapall").click(function(){
        $('#wrapall-meth p').wrapAll('<div class="scound"></div>')
    });
    $("#wrapinner").click(function(){
        $('#wrapall-meth h1').wrapInner('<div class="scound"></div>')
    });
});
// width method-----------
$(document).ready(function(){
    $('#width').click(function(){
        console.log($('#width-meth').width("400px"));

        console.clear();

        console.log("width : " + $('#width-meth').width());
        console.log("width : " + $('#width-meth').innerWidth());
        console.log("width : " + $('#width-meth').outerWidth());
        console.log("width : " + $('#width-meth').outerWidth(true));
    });
    $('#height').click(function(){
        console.log("height : " + $('#width-meth').height());
        console.log("height : " + $('#width-meth').innerHeight());
        console.log("height : " + $('#width-meth').outerHeight());
        console.log("height : " + $('#width-meth').outerHeight(true));
    });
});
// position offset---------------

$(document).ready(function(){
    $('#position').click(function(){
        var x = $('#position-off h1').position(); 
        console.log("Top : " + x.top + " left :"  + x.left);
    });
    $('#offset').click(function(){
        console.log($('#position-off h1').offset());
    });
});
// scroll event----------
$(document).ready(function(){
    $(window).scroll(function(){
        $('#scroll').html("");
        $('#scroll').append("Top :" + $(window).scrollTop() );

    });
    $('#scrolltop').click(function(){
        $(window).scrollTop(100);
    })
    
});
//hasclass method-----------------
$(document).ready(function(){
    $('#hasclass-btn').click(function(){
       var x=$('#hasclas').hasClass('class-meth');
       if(x==true){
        console.log('yes');
       }
       else{
        console.log('no');
       }
    });
});
// hide and show-----------------

$(document).ready(function(){
    $('#hide').click(function(){
        $('#hide-show').hide(1000);
    });
    $('#show').click(function(){
        $('#hide-show').show(1000);
    });
    $('#toggleh').click(function(){
        $('#hide-show').toggle(2000,function(){
            console.log("hey toggle");
        });
    });
});
// fade method-----------
$(document).ready(function(){
    $('#fade-out').click(function(){
        $('#fade-all').fadeOut("slow");
    });
    $('#fade-in').click(function(){
        $('#fade-all').fadeIn(3000);
    });
    $('#fade-toggle').click(function(){
        $('#fade-all').fadeToggle(2000);
    });
    $('#fade-to').click(function(){
        $('#fade-all').fadeTo(2000,0.1);
    });
});
// slide method----------------

$(document).ready(function(){
    $('#slide-up').click(function(){
        $('#slide').slideUp(2000);
    });
    $('#slide-downe').click(function(){
        $('#slide').slideDown(2000);
    });
    $('#slide-toggle').click(function(){
        $('#slide').slideToggle(2000);
    });
});
// animate- method-------------
$(document).ready(function(){
    $('#animate').click(function(){
        $('#animation').animate({ left : '150px'},2000);
        $('#animation').animate({ top : '150px'});
        $('#animation').animate({ left : '0px'});
        $('#animation').animate({ top : '0px'});
    });
    $('#animate-stop').click(function(){
        $('#animation').stop(true);
    })
});
// method chaning---------------
$(document).ready(function(){
    $('#chainaing-btn').click(function(){
        $('#chaining').css('background','pink').slideUp(2000).slideDown(2000);
    });
});