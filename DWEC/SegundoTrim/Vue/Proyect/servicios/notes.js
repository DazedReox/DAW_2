import { db } from "./firebaseConfig";
import { collection, addDoc, getDocs, query, where } from "firebase/firestore";

export async function getUserNotes(userId) {
  const notesRef = collection(db, "notes");
  const q = query(notesRef, where("userId", "==", userId));
  const snapshot = await getDocs(q);
  return snapshot.docs.map((doc) => ({ id: doc.id, ...doc.data() }));
}

export async function addNote(userId, title, content) {
  const notesRef = collection(db, "notes");
  return await addDoc(notesRef, { userId, title, content, timestamp: new Date() });
}
