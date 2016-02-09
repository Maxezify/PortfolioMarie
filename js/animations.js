

$(".container-fluid").hover(function(){

        $('#MarieLogo').fadeTo(250, 0);

        $(".Home").animate({right: '150px', queue: false});
        $(".Projets").animate({right: '150px', queue: false});
        $(".Contact").animate({right: '150px', queue: false});

      },

function(){

        $('#MarieLogo').fadeTo(750, 1);

        $(".Home").animate({right: '-0.1px', queue: false});
        $(".Projets").animate({right: '-0.1px', queue: false});
        $(".Contact").animate({right: '-0.1px', queue: false});


        });
