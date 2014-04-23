<?
class WServicesSlider extends CWidget
{
    //Yii::app()->clientScript->registerCssFile('css/CUserStatusBars.css');
    public function init()
    {

        $html = '<div id="c_wrap">
                    <div id="c_services">
                        <div id="c_servicesAnim">
                            <div class="el_servicesAnim">1</div>
                            <div class="el_servicesAnim">2</div>
                            <div class="el_servicesAnim">3</div>
                            <div class="el_servicesAnim">4</div>
                            <div class="el_servicesAnim">5</div>
                            <div class="el_servicesAnim">6</div>
                            <div class="el_servicesAnim">7</div>
                        </div>
                    </div>
                    <div class="button_servicesAnimPrev"></div>
                    <div class="button_servicesAnimNext"></div>

                </div>

                ';//<script src="'.Yii::app()->request->baseUrl.'/js/slide.js"></script>';

        echo $html;
    }

    public function run()
    {
    }

}