import{collection, addDoc} from "firebase/firestore";

async function addNote(userId, title, content){
  const notesRef = collection(db, "notes");
  await addDoc(notesRef, {
    userId,
    title,
    content,
    timestamp: new Date().toISOString(),
  });
}
