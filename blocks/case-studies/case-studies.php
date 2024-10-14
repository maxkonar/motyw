<?php
/**
 * Block Name: Case Studies
 *
 * This is the template that displays the case studies block.
 */

$caseStudies = get_field('case_studies');
if(empty($caseStudies)) {
        return;
}

$filterBar = ['All'];

// DLA OSOBY SPRAWDZAJĄCEJ!
// Nie podoba mi się przejście kilka razy foreachem po tablicy $caseStudies w celu znalezienia typów case studies.
// Niestety jestem do tego zmuszony bo takie było zadanie rekrutacyjne
// Dużo lepiej by było jakby case studies były cpt a potem blok gutenbergowy tylko pobierał sobie posty z cpt.
// Typy to powinny być kategorie cpt i case studies powinny mieć przypisane kategorie. 
// W takim wypadłu można by było po prostu pobrać kategorie i się nie przejmować tymi foreach'ami.
// W dodatku nie jestem w stanie tutaj obsłużyć wielojęzykowości tak jak robiłem to w poprzednich plikach.

foreach($caseStudies as $caseStudy) {
    foreach($caseStudy['type'] as $type) {
        if(!in_array($type, $filterBar)) {
            $filterBar[] = $type;
        }
    }
}

if(empty($filterBar)) {
    return;
}

$counter = 0;
?>
<div class="case-studies">
    <div class="case-studies__filters">
        <?php for($i = 0; $i < count($filterBar); $i++): ?>
            <a data-type="<?php echo esc_attr(trim(strtolower($filterBar[$i]))); ?>" href="#" class="case-studies__filter <?php echo $i === 0 ? 'case-studies__filter--active' : ''; ?>"><?php echo esc_html($filterBar[$i]); ?></a>
        <?php endfor; ?>
    </div>
    <div class="case-studies__grid">
        <?php foreach($caseStudies as $caseStudy): ?>
            <?php if($counter % 4 === 0):?>
            <div class="case-studies__group">
            <?php endif; ?>
            <div class="case-studies__item" data-type="<?php echo esc_attr(trim(strtolower(implode(',', $caseStudy["type"])))); ?>">
                <img src="<?php echo esc_url($caseStudy['image']['url']); ?>" alt="<?php echo esc_attr($caseStudy['image']['alt']); ?>" class="case-studies__image">
                <div class="case-studies__info">
                    <div class="case-studies__types">
                        <?php echo "<p>" . implode(' / ', $caseStudy["type"]) . "</p>";?>
                    </div>
                    <h3 class="case-studies__title"><?php echo esc_html($caseStudy['title']); ?></h3>
                    <a href="<?php echo esc_url($caseStudy['link']); ?>" class="case-studies__link"><?php echo esc_html($caseStudy['link_text']); ?></a>
                </div>
            </div>
            <?php if($counter % 4 === 3):?>
            </div>
            <?php endif; ?>
            <?php $counter++; ?>
        <?php endforeach; ?>
    </div>
</div>