
# Proiect: Feedback Management System

## Descriere generală a proiectului
Acesta este un sistem de gestionare a feedback-ului utilizatorilor pentru un restaurant, care permite colectarea, vizualizarea și gestionarea feedback-ului clienților. Utilizatorii pot evalua diferite aspecte ale restaurantului, cum ar fi **mâncarea**, **serviciul** și **vibe-ul**. Administrația poate vizualiza rapoarte detaliate ale acestor evaluări și poate lua măsuri în funcție de comentariile și ratingurile oferite.

## Funcționalitățile principale implementate
- **Formular de Feedback**: Utilizatorii pot completa un formular cu detalii despre experiența lor, incluzând evaluări pe baza mai multor criterii (mâncare, serviciu, vibe) și comentarii libere.
- **Admin Dashboard**: Interfață dedicată adminului pentru a vizualiza feedback-ul trimis de utilizatori, incluzând o tabelă cu detalii și opțiuni pentru editarea sau ștergerea feedback-urilor.
- **Grafic pentru evoluția ratingurilor**: Adminul poate vizualiza o diagramă interactivă care arată evoluția ratingurilor pentru fiecare categorie (mâncare, serviciu, vibe) pe parcursul lunilor.
- **Autentificare Admin**: Pentru a accesa zona de administrare, este necesar un cont de admin și parolă.

## Instrucțiuni pentru instalare, configurare și utilizare

### Pre-rechizite:
- **PHP** (versiunea 7.4 sau mai mare)
- **MySQL** (versiunea 5.7 sau mai mare)
- **MAMP/XAMPP** sau orice alt server local care suportă PHP și MySQL

### Pași pentru instalare:
1. **Clonarea sau descărcarea proiectului**:
   ```bash
   git clone <repository_url>
   ```

2. **Configurarea bazei de date**:
   - Deschide phpMyAdmin (sau un alt tool MySQL) și creează o bază de date, de exemplu: `feedback_db`.
   - Importă fișierul SQL care conține structura tabelului necesar (acesta ar trebui să fie inclus în proiect).

3. **Configurarea fișierului de conexiune la baza de date**:
   - Modifică fișierul `db.php` pentru a adăuga datele corecte de conexiune la baza de date (host, utilizator, parolă, nume bază de date).

4. **Lansarea aplicației**:
   - Deschide aplicația în browser la adresa `http://localhost:8888/proiect/`.
   - Navighează prin aplicație pentru a adăuga feedback, vizualiza feedback-ul și a interacționa cu datele.

### Exemple de utilizare:
1. **Adăugarea unui feedback**:
   - Accesează formularul de feedback.
   - Completează informațiile (nume, email, ratinguri) și trimite formularul.
   - Feedback-ul va fi stocat în baza de date.

2. **Vizualizarea feedback-urilor în Admin Dashboard**:
   - Accesează zona de administrare cu un cont de admin.
   - Vizualizează feedback-urile trimise de utilizatori într-o tabelă detaliată.
   - Poți edita sau șterge feedback-uri.

3. **Vizualizarea graficului cu evoluția ratingurilor**:
   - În Admin Dashboard, vizualizează graficul care arată evoluția ratingurilor pentru fiecare criteriu pe parcursul lunilor.

## Descrierea aplicației și scopul acesteia
Aplicația are scopul de a colecta și analiza feedback-ul utilizatorilor într-un mod eficient. Este destinată pentru restaurante sau alte tipuri de afaceri care doresc să îmbunătățească serviciile oferite pe baza feedback-ului clienților. Adminii pot vizualiza și analiza evaluările pe lună, iar utilizatorii pot ajuta la îmbunătățirea experienței generale.

## Funcționalitățile și tehnologiile utilizate
- **PHP**: Limbajul principal pentru backend și logica aplicației.
- **MySQL**: Sistemul de gestionare a bazei de date utilizat pentru stocarea feedback-ului.
- **HTML/CSS**: Folosite pentru crearea și stilizarea formularului și a paginilor admin.
- **JavaScript**: Folosit pentru interactivitate și pentru integrarea cu **Chart.js** pentru generarea graficelor.
- **Chart.js**: Bibliotecă JavaScript folosită pentru a crea grafice interactive.

## Documentație API (dacă este cazul)
În prezent, aplicația nu include un API extern, dar poate fi extinsă pentru a adăuga această funcționalitate în viitor, permițând integrarea cu alte aplicații sau servicii externe.

## Orice alte informații relevante care să evidențieze complexitatea și utilitatea proiectului
Acest proiect poate fi folosit pentru a colecta și analiza feedback-ul clienților într-un mod structurat, ajutându-i pe administratorii afacerii să îmbunătățească serviciile pe baza datelor oferite de clienți. Acesta permite o analiză vizuală a evoluției ratingurilor și poate fi extins ușor pentru a include caracteristici suplimentare, cum ar fi:
- **Integrarea unui sistem de autentificare mai avansat** (utilizatori înregistrați).
- **Exportul rapoartelor de feedback** într-un format CSV sau PDF.
- **Funcționalități de analiză a sentimentului** pe baza comentariilor.
