# Is My Cifeaux? How a Colour Perception Test Explores Brand Ownership

**Meta Description:** Interactive colour perception test exploring #CCFF00 through play. Six shades, binary choices, personality verdicts. Built in 8 hours, inspired by viral ismy.blue.

**URL:** https://ccff00.com/is-my-cifeaux/

---

## Nobody Asked for This (We Built It Anyway)

Colour perception tests went viral because they prove something we already suspected: your blue isn't my blue. Your turquoise leans green while mine leans aqua. Nobody agrees on where categories end.

So naturally (because this is how brand experiments work), I built one for cifeaux.

**Is My Cifeaux?** tests whether the yellow-green shades you're staring at qualify as the one true #CCFF00. Six colours. Binary choices. Humorous verdict at the end. Think ismy.blue but for people exploring what it means to culturally own a hex code.

If you can't tell I'm treating this both seriously and playfully, you haven't been paying attention.

---

## How the Test Works: Pattern Recognition for Colour Nerds

The original ismy.blue created by neuroscientist Patrick Mineault attracted 1.5 million visits in a month because it did three things brilliantly:

1. **Simple mechanic** — Binary yes/no for six shades
2. **Progressive difficulty** — Starts obvious, gets ambiguous near turquoise (#00CED1)
3. **Social comparison** — Shows where you draw the line vs. everyone else

I adapted this for cifeaux. Same structure. Different spectrum.

**The cifeaux version presents 13 colours adaptively:**
- Very Yellow: #EEFF00 → #DDFF00
- Yellow: #D8FF00 → #CEFF00
- **True Cifeaux: #CCFF00**
- Green: #C5FF00 → #B7FF00
- Very Green: #B0FF00 → #99FF00

You answer "Is this cifeaux?" for each of 6 adaptive questions. Results reveal your acceptance range, perception bias (more yellow or more green), and a verdict: Purist, Connoisseur, Pragmatist, Expansionist, Visionary, or Skeptic.

---

## Why Build a Colour Test? Brand Education Disguised as Play

Can one person claim a shade the way Tiffany owns robin's egg blue or Cadbury owns purple? Is that even possible? Is it art, or branding, or performance, or all three?

This isn't entertainment for entertainment's sake. It's brand education through interaction. Every person who takes the test learns:

1. **The official hex code** (#CCFF00 appears prominently)
2. **The pronunciation** ("cifeaux" reinforced throughout)
3. **The acceptable range** (what's close vs. what's not)
4. **The brand personality** (self-aware, specific, committed)

Then: brands published style guides nobody read. Now: brands build interactive experiences that make the learning accidental. Why it matters: engagement beats documentation.

The test delivers utility (designers/developers get reference points for "close enough"), entertainment (verdicts make people share results), and brand reinforcement (every screen mentions CCFF00).

Conversion through education. Education through play.

---

## The Verdict System: Personality Through Perception

Your colour choices reveal your relationship to brand boundaries.

**The Skeptic** — Accepted zero shades. You're either a troll or operating with impossible standards. Respect.

**The Purist** — Only #CCFF00 qualifies. You understand cifeaux isn't a range, it's a religion.

**The Connoisseur** — Two shades max. Refined taste. Strict boundaries. You know it when you see it.

**The Pragmatist** — Three to four shades accepted. Cifeaux is a vibe, not just a hex code. Room for interpretation, but standards remain.

**The Expansionist** — Five shades. Broad territory. You see family resemblance across the yellow-green spectrum. Bold.

**The Visionary** — All six qualify. Every shade is cifeaux if you believe hard enough. You're either colourblind or enlightened.

These aren't random labels. They're designed to be quotable, shareable, and slightly self-aware (because exploring colour ownership this seriously requires acknowledging the absurdity).

---

## Technical Build: Single HTML File, Zero Dependencies

The entire test lives in one HTML file. No frameworks. No build process. No npm install hell.

**Stack:**
- Vanilla JavaScript for interaction logic
- CSS gradients for results visualisation
- Mobile-responsive design (flexbox + clamp())
- WCAG AA contrast ratios (because neon with manners)
- MySQL database (results tracking)
- Google Analytics (G-N498PE7E7L)

**Key features:**
1. **Adaptive colour selection** — 13-colour pool with intelligent branching
2. **Gradient results display** — Shows accepted range overlaid on colour spectrum
3. **Perception bias calculation** — Determines if user leans yellow or green
4. **Responsive verdicts** — Changes based on specific answer patterns
5. **Error detection** — Catches first-question mistakes
6. **Database tracking** — All results saved for future analysis
7. **cPanel deployment** — Direct to production infrastructure

The code prioritises velocity over complexity. Ship. Test. Iterate.

Total build time: 8 hours from concept to production (including pivot from Vercel to cPanel mid-project, database integration, and mobile UX polish). This is what AI-assisted development enables — same-day shipping of brand-reinforcing interactive tools.

---

## What ismy.blue Taught Me About Viral Mechanics

Patrick Mineault's original test succeeded because it exploited a universal truth: nobody agrees on colour boundaries, and discovering your personal bias is inherently interesting.

**Lessons applied to Is My Cifeaux:**

**1. Binary choices reduce friction**
Yes/No is faster than sliders or spectrum selection. Lower cognitive load = higher completion rate.

**2. Social comparison drives sharing**
"I'm a Purist, what are you?" becomes the share hook. People want to compare results.

**3. Progressive difficulty creates engagement**
Easy choices first (obvious yellow/green) build confidence. Ambiguous middle colours create the "hmm, actually..." moment that makes tests memorable.

**4. Immediate results satisfy curiosity**
No email gate. No "calculate your score" delay. Answer six questions, see results. Respect user time.

**5. Educational value justifies participation**
Users leave knowing something new (their perception bias, the official cifeaux hex). Utility prevents "I just wasted 30 seconds" regret.

The test isn't just a quiz. It's a demonstration of what creative exploration looks like when you ship tools instead of talk about shipping tools.

---

## The "If Not Me, Who?" Philosophy in Action

Building a colour perception test for a personal brand colour is objectively absurd.

I'm aware.

But if Pantone can charge $500 annually for colour matching systems, and Tiffany owns robin's egg blue culturally, why can't an individual explore owning cifeaux? If not me, who? If not now, when?

This project proves range (from concept to code to deployment), demonstrates AI capability (built in hours not weeks), and reinforces cultural exploration (one more cifeaux touchpoint in the world).

Serious craft. Playful delivery. Commercial potential.

The test isn't the product. The test demonstrates that someone exploring a brand builds infrastructure around it. Style guides. Colour tests. Design systems. Accessible palettes. Database tracking. Each artifact builds authority.

Every project is a proof point. The diversity is the point. This is what one person can create now. Things that used to need teams, investors, or a lifetime of skill refinement.

---

## Accessibility Notes: Neon with Manners

The test itself maintains WCAG AA contrast ratios:
- White text on black background: 21:1
- #CCFF00 on black: 19.56:1 (WCAG AAA)
- Buttons: 2px borders for visibility
- Keyboard navigation: Full tab-through support
- Mobile hover states fixed (no stuck buttons)

Neon is an accent, not a field. The colour swatches fill the display area, but text remains readable. Focus states use cifeaux borders.

Accessibility so solid it could pass a rental inspection (but won't).

---

## Try the Test

**Live site:** https://ccff00.com/is-my-cifeaux/

**GitHub repo:** https://github.com/cifeaux/is-my-cifeaux

Takes 30 seconds. Reveals your colour perception bias. Teaches you the one true cifeaux. Makes you question whether you've been spelling "chartreuse" wrong this whole time.

---

## FAQs

**Q: Is this actually useful or just brand theatre?**
A: Both. Designers and developers get reference points for "close enough to cifeaux." Everyone else gets a fun 30-second interaction. Utility and entertainment aren't mutually exclusive.

**Q: Why base it on ismy.blue?**
A: Because that test proved the format works. 1.5 million visits in a month. Why reinvent mechanics when you can adapt proven engagement patterns?

**Q: What's the "correct" answer for the #CCFF00 shade?**
A: All of them say yes. But if you're not a Purist, are you really committed to the bit?

**Q: Can I use this for my own brand colour?**
A: Code's on GitHub. Fork it. Adapt it. Ship your own version. Open-source eats gatekeepers.

**Q: How long did this take to build?**
A: 8 hours. Concept, code, deployment, database, article. This is what AI-assisted development enables.

---

## Key Takeaways

- Colour perception tests work because nobody agrees on boundaries
- Brand education through interaction beats static documentation
- Viral mechanics: binary choices, social comparison, immediate results
- Single HTML file can deliver full interactive experience (with backend)
- Shipping tools > talking about shipping tools
- AI-assisted development collapses timeline from weeks to hours
- Every project is a proof point — the diversity is the point

---

**If Pantone can own colour systems and Tiffany can own robin's egg blue, you can explore owning cifeaux—but only if you build the infrastructure to prove it's possible.**

---

**Related:**
- [Take the test](https://ccff00.com/is-my-cifeaux/)
- [CCFF00 Brand](https://ccff00.com)
- [GitHub Repository](https://github.com/cifeaux/is-my-cifeaux)

---

_Built with Claude Code. Inspired by ismy.blue by Patrick Mineault. October 2025._
