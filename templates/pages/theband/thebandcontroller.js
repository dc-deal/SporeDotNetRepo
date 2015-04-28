/**
 * Created by Franky on 13.04.2015.
 * angular module band panels
 */    
    angular.module('mainApp')	
    .controller('bandimagesController', function () {	    
	    this.BandMitgliederImages = portraits;
    })  
    .controller('bandpanelController', function ($http) {
		this.images = innerImages;
		var controller = this; // WICHTIG WEGEN DEM SCOPE... 
		APICall(
			$http,
			'home',
			{},
			function(BandQuerstionsCall) { 
				// what now???
				// controller zuweisen...
				controller.articles = BandQuerstionsCall; // controller sonst meint er die funktion selbst...
				console.log(BandQuerstionsCall);
			}
		);
		 
    })    
    .controller('bandpanelShowController', function ($http,$routeParams) {
    	var controller = this; // wichtig um den controller iun den fucntions anzusprechen
		APICall(
			$http,
			'home',
			{id : $routeParams.id},
			function(BandQuerstionsCall) { 
				// what now???
				// controller zuweisen...
				controller.article = BandQuerstionsCall; // controller sonst meint er die funktion selbst...
				console.log(BandQuerstionsCall);
			}
		);    	
		
		this.saveArticle = function(article){
			controller.errors = null;
			$http({method:'POST',url:'/notes',data:article});
		};
    })
    .directive('bandpanelDirective', function(){
        return {
            restrict: 'E',
            templateUrl: 'templates/pages/theband/thebandpaneltemplate.html',
            scope: {
            	genres: '='
            }
        };
    });
	    
	    
    	var samplearticle = {
    		Header : 'TEST1',
    		Content : 'BLA'
    	};
	    
var questions = [
'Stelle dich bitte vor und wie bist du zur Musik gekommen?',
'Welche Bands oder Musikstile haben dich geprägt?',
'Erzähle uns deine Lebensphilosophie?',
'Was gefällt dir überhaupt nicht?',
'Was verbindet dich mit the spore?',
];

var names = [
	'Tommy',
	'Franky',
	'Maik',
	'Clemens',
	'Chris'
];


var portraits = [
	{id : 0,fil : 'img/Spore/sw tommy drums.jpg'},
	{id : 1,fil : 'img/Spore/sw mike beobachtet franky.jpg'},
	{id : 2,fil : 'img/Spore/sw clemens+franky.jpg'},
	{id : 3,fil : 'img/Spore/Banner/Studio Gesangsaufnahme_589319_web_R_K_by_Christian v.jpg'},
	{id : 4,fil : 'img/Logo The spore Kopie.png'}
];

var innerImages = [
'img/Spore/sw clemens+franky.jpg',
'img/Spore/sw tommy drums.jpg',
'img/Spore/sw tommy drums.jpg',
'img/Spore/sw clemens+franky.jpg',
'img/Spore/sw clemens+franky.jpg'
];


var responses = [
['Hallo, hier ist euer Tommy die lebende Drum-Machine! Eigentlich bin ich erst verhältnismäßig spät zum Musikmachen gekommen. Mir war vorher Musik durch langweilige Schultheorie und elterlichen Zwang sehr vermiest worden, allerdings hat die Gitarre mich dann doch noch zur Musik bekehrt. Zeitweise hat dies sogar auf meinen Bruder abgefärbt. Zum Schlagzeugspielen kam ich erst später, als ich Franky für die Gitarre begeistern konnte und mit ihm eine Band gründete. Weil die Trommeln nicht schweigen wollten, habe ich dieses Instrument dann auch noch gelernt und gebe the spore seitdem an den Drums den Puls – naja und bin dabei geblieben.',
'Ich war immer schon sehr von Rockmusik begeistert, besonders als ich zur elektrischen Gitarre wechselte. Der Stil hat mich sehr fasziniert. Dazu kommt noch, dass mein Gitarrenlehrer ein großer Blues-Fan war und davon etwas auf mich abgefärbt hat. Speziell die Improvisation dabei hat mir sehr gefallen.',
'Meine Philosophie ist Freundlichkeit :)',
'Ich mag es nicht wenn man mich unterbricht und nicht ausreden lässt.',
'Spaß und Freude daran mit Freunden Musik zu machen!'],
['Ich bin Franky, der Leadgitarrist von The Spore. Ich habe schon mit allen möglichen Musikstilen gearbeitet, jedoch hat mich der Rock von allen am meisten angetan, eine wahre "Rock romance". Schon als Teenager habe ich mit meinem Bruder Songs produziert, heute mache ich das auch mal alleine :). Meine grösste Leidenschaft ist,  Solos und Songs zu schreiben.',
'Vor allem Punkmusik der 90er sowie Nirvana u. Blink 182. Des weiteren war ich auch von Zakk Wylde und seiner Spieltechnik beeindruckt, Insb. Das auf dem Album "Book of Shadows". Später habe ich auch Aufmerksamkeit an der härteren Spielweise des heavy Metal der 80 (z.b. Whitesnake) er Jahre und teils auch Metalcore gefunden. Dennoch war schon immer ein grosser Fan von Steven Tyler und Freddy Mercury!',
'"Komm auf die Akademie! Arbeite Hart!! Lerne Fleissig!! ...und irgendwann baust du Kühlschränke und dergleichen!!"',
'Leute, die Lynyrd Skynyrd nicht mögen, weil LYNYRD SKYNYRD genial war / ist.',
'Zusammen mit den Jungs zu jammen & unsere Songs spielen. Die gemeinsamen Proben finde ich immer erfrischend und motivierend! '],
['Ich bin Maik und der ruhigste Teil der Band, als Bassist wirke ich auch in der Band ehr im Hintergrund, nur wenn ich nicht weg bin merkt man das etwas fehlt. Die Frage ist wie kommt man nicht zu der Musik, sie ist all gegenwärtig und manche entscheiden sich Zuhörer zu sein und Andere möchten etwas Mitteilen ich denke ich gehöre zu zweiten und Franky ist auch nicht ganz unschuldig ;-)',
'Ich denke am meisten wurde ich von den Ärtzen und Rise Against geprägt, ich mag es wenn man beim reden/singen nicht ein Blatt vor den Mund nimmt und auf Missstände aufmerksam macht.',
'John Lennon hat mal gesagt " Life is what happens zo you while you are making busy other plans" der Spruch trifft so ziemlich auf mein leben zu.',
'Lügen aus purem Eigennutz',
'Wir sind alles gute Freunde und haben einige Ansichten die sich prima ergänzen und zusammen ein Großes ganzs ergeben.'],
['11',
'22',
'33',
'44',
'55'],
['111',
'222',
'333',
'444',
'555']
];