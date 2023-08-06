gsap.registerPlugin(ScrollTrigger);
gsap.from('.animate1',{
    duration :3,
    opacity: 0,
    x:-100,
    stagger:0.6
});

gsap.from('.animate2',{
    duration :4,
    opacity: 0,
    x:100,
    stagger:0.6
});