import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

function revealOnScroll() {
    const groups = new Map();

    document.querySelectorAll('[data-reveal]').forEach((el) => {
        const key = el.getAttribute('data-reveal-group') || el;
        if (!groups.has(key)) groups.set(key, []);
        groups.get(key).push(el);
    });

    const variants = {
        'fade-up': { from: { y: 40, opacity: 0 }, to: { y: 0, opacity: 1 } },
        'fade-in': { from: { opacity: 0 }, to: { opacity: 1 } },
        'zoom-in': { from: { scale: 0.92, opacity: 0 }, to: { scale: 1, opacity: 1 } },
        'fade-left': { from: { x: -40, opacity: 0 }, to: { x: 0, opacity: 1 } },
        'fade-right': { from: { x: 40, opacity: 0 }, to: { x: 0, opacity: 1 } },
    };

    groups.forEach((els) => {
        const type = els[0].getAttribute('data-reveal');
        const { from, to } = variants[type] || variants['fade-up'];

        gsap.set(els, from);

        ScrollTrigger.batch(els, {
            start: 'top 85%',
            onEnter: (batch) => gsap.to(batch, {
                ...to,
                duration: 0.8,
                ease: 'power3.out',
                stagger: 0.12,
                overwrite: true,
            }),
            once: true,
        });
    });
}

function animateCounters() {
    document.querySelectorAll('[data-counter]').forEach((el) => {
        const target = parseFloat(el.getAttribute('data-counter'));
        if (Number.isNaN(target)) return;

        const proxy = { value: 0 };
        ScrollTrigger.create({
            trigger: el,
            start: 'top 90%',
            once: true,
            onEnter: () => {
                gsap.to(proxy, {
                    value: target,
                    duration: 1.6,
                    ease: 'power2.out',
                    onUpdate: () => {
                        el.textContent = Math.round(proxy.value).toLocaleString('fr-FR');
                    },
                });
            },
        });
    });
}

function floatingBlobsParallax() {
    document.querySelectorAll('[data-parallax]').forEach((el) => {
        const speed = parseFloat(el.getAttribute('data-parallax')) || 0.3;
        gsap.to(el, {
            yPercent: speed * 100,
            ease: 'none',
            scrollTrigger: {
                trigger: el.closest('[data-parallax-section]') || el.parentElement,
                start: 'top bottom',
                end: 'bottom top',
                scrub: true,
            },
        });
    });
}

function navScrollState() {
    const nav = document.querySelector('[data-nav]');
    if (!nav) return;

    ScrollTrigger.create({
        start: 'top -10',
        onUpdate: (self) => {
            nav.classList.toggle('is-scrolled', self.scroll() > 10);
        },
    });
}

function heroEntrance() {
    const hero = document.querySelector('[data-hero]');
    if (!hero) return;

    const items = hero.querySelectorAll('[data-hero-item]');
    if (!items.length) return;

    gsap.set(items, { y: 30, opacity: 0 });
    gsap.to(items, {
        y: 0,
        opacity: 1,
        duration: 0.9,
        ease: 'power3.out',
        stagger: 0.15,
        delay: 0.15,
    });
}

export function initAnimations() {
    ScrollTrigger.getAll().forEach((trigger) => trigger.kill());

    heroEntrance();
    revealOnScroll();
    animateCounters();
    floatingBlobsParallax();
    navScrollState();

    ScrollTrigger.refresh();
}

document.addEventListener('DOMContentLoaded', initAnimations);
document.addEventListener('livewire:navigated', initAnimations);
