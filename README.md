# Plikownia

<b>OPIS PROJEKTU:</b>

Wykonaj aplikację webową będącą repozytorium plików.<br>
Pliki są wyświetlane w tabelce, która posiada mechanizm sortowania i paginacji.<br>
Zawartość tabelki odpowiada pewnemu katalogowi. Katalogów może być zdefiniowanych kilka.<br>
Korzystanie z plikowni wymaga autoryzacji. Bazą użytkowników zarządza administrator (użytkownik, hasło, zestaw uprawnień)<br>

Użytkownik ma uprawnienia:
<ul>
<li>Oglądać tabelkę z zawartością dla danego katalogu</li>
<li>Użytkownik może wrzucać nowy plik</li>
<li>Użytkownik może pobierać plik (poprzez kliknięcie elementu na tabeli)</li>
<li>Użytkownik może usuwać plik - jeden z elementów tabeli</li>
</ul>

Uprawnienia powinny być nadawane niezależnie i polegają na powiązaniu użytkownika z katalogiem, i zestawem uprawnień.<br>
Ustawienia globalne systemu to lista dopuszczalnych typów plików (np PDF, DOCX,) oraz maksymalna wielkość pliku.<br>
Interakcję aplikacji zrealizuj z wykorzystaniem technologii AJAX.<br>
Aplikacja powinna być responsywna. Zaproponuj odpowiedni layout i jego zmiany w zależności od wielkości wyświetlacza.<br>
Dane dla aplikacji powinny być przechowywane w bazie MySQL i w systemie plików.<br>
Uwaga: katalogi z plikami MUSZĄ być poza DOCUMENT_ROOT, czyli tak, aby nie było możliwe pobranie pliku z ominięciem systemu (np. poprzez podanie ścieżki URL)<br>
