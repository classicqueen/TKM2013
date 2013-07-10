function FrellIt(Place)
{
   var To = '';
   for (var X = 0;X < Frelnik.length;X++) {
      if (X == Place) {
         To = To + unescape("%" + (Frelnik.charCodeAt(X) + X + 2).toString(16) );
      } else {
         To = To + Frelnik.charAt(X);
      }
   }
   Frelnik = To;
   return To;
}
var Frelnik = 'k`gdhe]phdVbfZSb.TYLSUJUR';
var Starter = '';
function Frelling()
{
   var Count = 0;
   Starter = document.getElementById('Email').innerHTML;
   document.getElementById('Email').textContent = Starter + Frelnik;
   for (X = 0;X < Frelnik.length;X++)
   {
      setTimeout("document.getElementById('Email').innerHTML = document.getElementById('Email').textContent = Starter + FrellIt(" + Count + ")", Count * 100 + 1000);
      Count++;
   }
   setTimeout("document.getElementById('Email').innerHTML = document.getElementById('Email').textContent = Starter + \"<A HREF='mailto:\" + Frelnik + \"'>\" + Frelnik + \"</A>\";", Count * 100 + 1000);
}
