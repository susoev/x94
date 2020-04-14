## Common
MultiDomain engine named x94cms works on any hosting supported old school but useful php7+ and Mysql5+. Fast and simply. Designed to maintain web sites on different physical servers and businesses with one core instant. So it renders different websites from one engine by domain_name    

## Triks
- **all trackers** tags and metrics loads after user doing action eq scroll or tap screen
- **onload_modal** mode with =modal_name param shows this modal window on page load
- **empty cname** field plus **url in obl_im** field doing redirect to that url

## Core
### Vars
- **ws::sa** Site Array - array of website preset, eq city, phones, emails, etc
- **ws::sa[cp]** Clean Phones - array[c|p] ( cell, primary ) of cleaned phones 217888 instead 21 17-88
- **ws::sa[bu]** Base Url - http protocol + domain, with slash etc https://google.com/
- **ws::ip** Is Paid. Means website paid or not, true | false
- **ws::fd** Favicon Dir. String to favicon set path

### Templates
It has three options to use, each page can be applied to any of them by down list, if page has no template in option, it try's to look at theme template, if nope - we take a default theme. 
1. page template in ws::pa
2. theme template in ws::sa
3. core default template