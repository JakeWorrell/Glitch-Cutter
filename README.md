Glitch Cutter
=============

Glitch Cutter will randomly create small audio files made from a tiny part of your other audio files. It does so randomly in a batch as large as you specify. The code isn't particularly nice, but it works.

I created it to create abstract sounds to be used as instruments in [Renoise](http://www.renoise.com). I also just thought it seemed like a good idea at the time.

Requirements
------------
 * PHP 5.3
 * a unix/linux based CLI with 'find' & 'grep' (tested on my Macbook Pro with OSX 10.7.3)
 * [SOX](http://sox.sourceforge.net/Main/HomePage) (which is awesome, by the way)
 * (optional) a [Wordnik](http://www.wordnik.com/) API key for creating memorable output folder names

How To Use
----------
 * cp config-example.php config.php and optionally add your wordnik API key
 * change any other things you need in config.php (eg, source directory)
 * php go.php