gsap.registerPlugin(ScrollTrigger);

gsap.to(".h_text",{
    x: -300,
    duration:1,
    opacity:0,
    scrollTrigger:{
        trigger:".h_text",
        start:"top 40%",
        end:"top 20%",
        
        markers:true,
        toggleActions:"restart reverse restart reverse"
    }
})
gsap.to(".h_text",{
    x: -300,
    duration:1,
    opacity:0,
    scrollTrigger:{
        trigger:".h_text",
        start:"top 90%",
        end:"top 70%",
        
        markers:true,
        toggleActions:"restart reverse restart reverse"
    }
})