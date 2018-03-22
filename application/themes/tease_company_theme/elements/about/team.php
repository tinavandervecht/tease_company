<div class="container">
    <section id="team" class="section_padding">
        <div class="row">
            <div class="col-md-8">
                <?php
                    $a = new Area('Team Overview');
                    $a->display($c);
                ?>
            </div>
            <div class="col-md-4">
                <?php
                    $a = new Area('Team Blurb');
                    $a->display($c);
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <?php
                    $a = new Area('About Our Team');
                    $a->display($c);
                ?>
            </div>
        </div>
    </section>
</div>
