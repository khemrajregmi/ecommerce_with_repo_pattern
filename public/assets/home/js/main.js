/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var $ = jQuery.noConflict();

function regWizard(configs) {

        var defaultConfig = {
            capsuleClass:'rwtn-capsule',
            capsuleIdPrefix:'rwtTab',
            pannelClass:'reg-wiz-tab-panel',
            pannelIdPrefix:'rwtp',        
            navIds:{
                prev:'prv',
                next:'nxt'
            }
        };

        configs = configs || defaultConfig;

        var pannelClass = '.'+configs.pannelClass,
            pannelIdPrefix = '#'+configs.pannelIdPrefix;
        var totalPanels = $(pannelClass).length,
            currentPanel = 1;
        // initialize capsule arrange
        var manageTopNavPosInit = manageTopNavPos(configs);
            manageTopNavPosInit();
        // initialize nav btn control
        showHideControls(currentPanel,totalPanels,configs);
        var changeCapsuleCall = new changeCapsule();
        changeCapsuleCall(currentPanel,configs);
        //console.log(capsuleWrapper);



        // to arrange top nav of the wizard
        function manageTopNavPos(configs){
            return function(){
                        var capsuleClass = '.'+configs.capsuleClass,                 
                            noOfRwtnCapsule = $(capsuleClass).length,
                            rwtnCapsuleSecWidth = 100 / noOfRwtnCapsule;
                            $(capsuleClass).css({'width':rwtnCapsuleSecWidth-1 +'%'});
            }
        
        }

        // to show hide control btn
        function showHideControls(currentPanelNo,totalPanelNo,config) {
            var noOfRwtnCapsule = totalPanelNo,
                navPrev = config.navIds.prev,
                navNext = config.navIds.next;
            if (currentPanelNo == 1) {
                $('#'+navPrev).css({
                    'display': 'none'
                });
            } else {
                $('#'+navPrev).css({
                    'display': 'inline-block'
                });
            }
            if (currentPanelNo == totalPanelNo) {
                $('#'+navNext).css({
                    'display': 'none'
                });
            } else {
                $('#'+navNext).css({
                    'display': 'inline-block'
                });
            }
        }


        // to change the wizard nav capsule
        function changeCapsule() {
            var calledCapsule = [];
            return function(currentPanelNo,configs) {
                var capsuleClass = '.'+configs.capsuleClass,
                    capsuleIdPrefix = '#'+configs.capsuleIdPrefix;
                var currentCapsule = capsuleIdPrefix + currentPanelNo;
                if ($.inArray(currentCapsule, calledCapsule) == -1) {
                    calledCapsule.push(currentCapsule);
                } else {
                    calledCapsule = $.grep(calledCapsule, function(value) {
                        return value != currentCapsule;
                    });
                }
                $(capsuleClass).removeClass('success-capsule');
                $.each(calledCapsule, function(k, v) {
                    var id = v;
                    $(id).addClass('success-capsule');
                });
            };
        }

        // to change the wizard panel
           
        return {
            nextPanel: function() {
                var targetPanel = currentPanel < totalPanels ? currentPanel + 1 : currentPanel;
                currentPanel = currentPanel < totalPanels ? currentPanel + 1 : currentPanel;
                var targetPanelId = pannelIdPrefix + targetPanel;
                $(pannelClass).css({
                    'display': 'none'
                });
                $(targetPanelId).css({
                    'display': 'block'
                });
                changeCapsuleCall(currentPanel,configs);

                showHideControls(currentPanel,totalPanels,configs);
            },
            prePanel: function() {
                changeCapsuleCall(currentPanel,configs);
                var targetPanel = currentPanel > 1 ? currentPanel - 1 : currentPanel;
                currentPanel = currentPanel > 1 ? currentPanel - 1 : currentPanel;
                var targetPanelId = pannelIdPrefix + targetPanel;
                $(pannelClass).css({
                    'display': 'none'
                });
                $(targetPanelId).css({
                    'display': 'block'
                });
                showHideControls(currentPanel,totalPanels,configs);
            },
            getCurrentPanel: function() {
                return currentPanel;
            }
        }
       
};

var firstWizard = new regWizard();

var secondWizard = new regWizard({
        capsuleClass:'rwtn-capsule2',
        capsuleIdPrefix:'rwtTab2',
        pannelClass:'reg-wiz-tab-panel2',
        pannelIdPrefix:'rwtp2',        
        navIds:{
            prev:'prv2',
            next:'nxt2'
        }
    });


    $('#nxt2').on('click', function() {
        secondWizard.nextPanel();
    });
    $('#prv2').on('click', function() {
        secondWizard.prePanel();
    });



        $('.reg-wiz-navigator #nxt').on('click', function() {
            firstWizard.nextPanel();
        });
        $('.reg-wiz-navigator #prv').on('click', function() {
            firstWizard.prePanel();
        });


