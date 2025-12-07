import fetch from "node-fetch";

export async function handler(event) {
  try {
    const data = JSON.parse(event.body);

    const response = await fetch("https://api.netlify.com/api/v1/submissions", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        Authorization: `Bearer ${process.env.NETLIFY_ACCESS_TOKEN}`
      },
      body: JSON.stringify({
        form_name: "contact",
        payload: {
          name: data.name,
          email: data.email,
          phone: data.phone,
          subject: data.subject,
          message: data.message
        }
      })
    });

    return {
      statusCode: 200,
      body: JSON.stringify({ success: true })
    };

  } catch (error) {
    return {
      statusCode: 500,
      body: JSON.stringify({ success: false })
    };
  }
}
